<?php

namespace App\Http\Controllers\admin;

use App\Edition;
use App\Type;
use App\User;
use App\Salle;
use App\Region;
use App\Categorie;
use App\Users_types_region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Exports\OrientateursExport;
use Redirect;
use Auth;

class OrientateurController extends Controller
{
    /**
     * List counselor
     *
     * @param  mixed $request
     * @return void
     */
    public function listeorientateur(Request $request){
        $salles = Salle::select('salles.*')
        ->join('users', 'users.id', '=', 'salles.user_id')
        ->where([['users.role','orientateur']])
        ->orderByDesc('created_at')
        ->paginate(10);
        $editions=Edition::all();
        return view('admin.orientateurs.index')->with(['salles'=> $salles,'editions'=> $editions]);
    }

    public function create(Request $request){
        $editions=Edition::all()->sortByDesc('created_at');
        $regions = Region::all(['id', 'nom']);
        return view('admin.orientateurs.create',compact('regions','editions'));
    }
    /**
     * Create counselor with her room
     *
     * @param  mixed $request
     * @return view
     */
    public function store(Request $request){
        $request->validate([
            'orientateurnom'=>'required',
            'orientateurprenom'=>'required',
            'email'=>'required|email|unique:App\User,email',
            'tel'=>'required',
            'nomDeLaSalle'=>'required',
            'descriptionDeLaSalle'=>'required|max:300',
            'standDeLaSalle'=>'required|file',
            'type'=>'required',
            'region'=>'required',
            // 'videoDeLaSalle'=>'required',
        ]);
        if($request->hasFile('standDeLaSalle')){
            $stand = $request->file('standDeLaSalle');
            $newstand = time() .'_'. str_replace(' ', '', $stand->getClientOriginalName());
            $stand->move('dist/files/stands/', $newstand);
        }
        $user = User::create([
            'nom' => $request->input('orientateurnom'),
            'prenom' => $request->input('orientateurprenom'),
            'email' => $request->input('email'),
            'tel' => $request->input('tel'),
            'region_id' => $request->input('region'),
            'password' => Hash::make($request->input('email')),
            'num_edition' => $request->input('num_edition'),
            'role' => 'orientateur',
            'type' => $request->input('type')
            ]);

        $salle = Salle::create([
            'nom' => $request->input('nomDeLaSalle'),
            'description' => $request->input('descriptionDeLaSalle'),
            'stand' =>  $newstand,
            'lien_video' => 'link',
            'user_id' => $user->id
          ]);

          $request->session()->flash('status','La création est effectué avec succès');
          return redirect()->route('orintateur.liste');
        }
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $editions= Edition::all()->sortByDesc('created_at');
        $salle = Salle::findOrFail($id);
        $regions = Region::all(['id', 'nom']);
        return view('admin.orientateurs.edit', compact('salle','regions','editions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id){
        $salle = Salle::find($id);
        $user = User::findOrFail($salle->user->id);
        if($request->hasFile('standDeLaSalle')){
            $stand = $request->file('standDeLaSalle');
            $newstand = time() .'_'. str_replace(' ', '', $stand->getClientOriginalName());
            if(!empty($salle->stand)){
                File::delete('dist/files/stands/'. $salle->stand);
            }
            $stand->move('dist/files/stands/', $newstand);

            $salle->fill([
                'stand' =>  $newstand,
            ]);
        }
        $salle->fill([
        'nom' => $request->input('nomDeLaSalle'),
        'description' => $request->input('descriptionDeLaSalle'),
        'lien_video' => 'link',
        ]);
        $user->fill([
            'nom' => $request->input('orientateurnom'),
            'prenom' => $request->input('orientateurprenom'),
            'email' => $request->input('email'),
            'tel' => $request->input('tel'),
            'region_id' => $request->input('region'),
            'password' => Hash::make($request->input('email')),
            'num_edition' => $request->input('num_edition'),
            ]);
        $user->save();
        $salle->save();
        $request->session()->flash('status','La salle d\'orientateur est bien editée');
        return redirect()->route('orintateur.liste');
    }
    /**
     * Start meeting
     *
     * @param  mixed $attendeepw
     * @param  mixed $id
     * @return void
     */
    public function startMetting($id){
        $salle = Salle::findOrFail($id);
        if(\Bigbluebutton::isMeetingRunning($salle->id) == true){
            $url=\Bigbluebutton::join([
                   'meetingID' => $salle->id,
                   'userName' => Auth::user()->prenom .' '.Auth::user()->nom,
                   'password' =>  $salle->user->email."_moderator" //which user role want to join set password here
                ]);
        }
        else{
            $url=\Bigbluebutton::start([
                    'meetingID' => $salle->id,
                    'moderatorPW' => $salle->user->email.'_moderator', //moderator password set here
                    'userName' => Auth::user()->prenom .' '.Auth::user()->nom,//for join meeting
                    'meetingName' => $salle->nom,
                    'attendeePW' => $salle->user->email.'_attendeePW',
                    'endCallbackUrl'  => route('profile.info'),
                    'logoutUrl' => route('logout.bbb',['id'=> $salle->id]),
                    'record'=>true,
                    //'moderatorOnlyMessage' => 'Orientation.tamkine.org',
                ]);
            $salle->is_running=true;
            $salle->save();
        }
        return redirect()->to($url);
    }
    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        if ($request->ajax()){
            $user = User::findOrFail($id);
            if ($user){
                $user->forceDelete();
                return response()->json(['success' => true]);
            }
        }
    }

    public function rechercher(Request $request){
        $q = $request->input('q');
        $editions=Edition::all()->sortByDesc('created_at');
        $salles = Salle::select('salles.*')
                        ->join('users', 'users.id', '=', 'salles.user_id')
                        ->where([['users.role','orientateur'],['users.email','LIKE','%'.$q.'%']])
                        ->orWhere([['users.role','orientateur'],['users.nom','LIKE','%'.$q.'%']])
                        ->orWhere([['users.role','orientateur'],['users.prenom','LIKE','%'.$q.'%']])
                        ->orWhere([['users.role','orientateur'],['salles.nom','LIKE','%'.$q.'%']])
                        ->orderByDesc('created_at')
                        ->paginate(10)->withQueryString();
        return view('admin.orientateurs.index')->with(['salles' => $salles,'q'=>$q,'editions'=>$editions]);
    }

    public function export(Request $request){
        $validated = $request->validate([
            'dateDebut' => 'required',
            'dateFin' => 'required',
        ]);
        $dateDebut = Carbon::parse($request->input('dateDebut'));
        $dateFin = Carbon::parse($request->input('dateFin'))->addDays(1);
        if($dateDebut>$dateFin){
            return Redirect::back()->with('message', 'La date de fin doit être supérieure à date début.');
        }
        else{
            return Excel::download(new OrientateursExport($dateDebut,$dateFin), 'orientateurs_'.Carbon::now()->format("Y-m-d(H-i-s)").'.xlsx');
        }
    }//fin méthode export

    public function salle_ouvertes(Request $request){
        $edition=Edition::all();
        $salles = Salle::select('salles.*')
            ->join('users', 'users.id', '=', 'salles.user_id')
            ->where([['users.role','orientateur'],['salles.is_running',true]])
            ->orderByDesc('created_at')
            ->paginate(10)->withQueryString();
        return view('admin.orientateurs.index')->with(['salles' => $salles,'editions'=>$edition]);
    }
    public function filter_edition(Request $request){
        $edition=Edition::all();
        $salles = Salle::select('salles.*')
            ->join('users', 'users.id', '=', 'salles.user_id')
            ->where([['users.role','orientateur'],['users.num_edition',$request->input('inputEdition')]])
            ->orderByDesc('created_at')
            ->paginate(10)->withQueryString();
        return view('admin.orientateurs.index')->with(['salles' => $salles,'editions'=>$edition]);
    }

}
