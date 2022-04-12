<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Salle;
use App\Region;
use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use Spatie\Analytics\Analytics;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Exports\UsersExport;
use Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role','=','participant')
        ->orderByDesc('created_at')
        ->paginate(10);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Salle::find($id);
        return view('admin.salle.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $user = User::find($user);
        $regions = Region::all();
        return view('admin.users.edit',compact('user','regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $request->all();
        $user = User::find($user);
        $user->fill([
            'nom' => $request->input('orientateurnom'),
            'prenom' => $request->input('orientateurprenom'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('email')),
            'region_id' => $request->input('region'),
        ]);
        $user->save();
        $request->session()->flash('status','Utilisateur édité');
        return redirect()->route('users.index');
        //dd("Bien !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()){
              $user = User::findOrFail($id);

            if ($user){
                $user->forceDelete();
                return response()->json(['success' => true]);
            }

        }

    }
    public function testGoogleAnalytics(){
        $analyticsData = \Analytics::fetchVisitorsAndPageViews(Period::days(7));
        dd($analyticsData);
    }

    public function rechercher(Request $request){
        $q = $request->input('q');
        $users= User::select('*')
                    ->where([['role','participant'],['email','LIKE','%'.$q.'%']])
                    ->orWhere([['role','participant'],['nom','LIKE','%'.$q.'%']])
                    ->orWhere([['role','participant'],['prenom','LIKE','%'.$q.'%']])
                    ->orWhere([['role','participant'],['nom','LIKE','%'.$q.'%']])
                    ->orderByDesc('created_at')
                    ->paginate(10)->withQueryString();
        return view('admin.users.index')->with(['users' => $users,'q'=>$q]);
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
            return Excel::download(new UsersExport($dateDebut,$dateFin), 'participants_'.Carbon::now()->format("Y-m-d(H-i-s)").'.xlsx');
        }
    }//fin méthode export

}
