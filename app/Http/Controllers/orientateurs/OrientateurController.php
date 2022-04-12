<?php
namespace App\Http\Controllers\orientateurs;

use App\Salle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class OrientateurController extends Controller{

    public function index(){
        $salle=Salle::where('user_id', Auth::user()->id)->first();
        return view('orientateurs.salle')->with('salle', $salle);
    }

    public function salle_pleniere(){
        $salle=Salle::where('id', 1)->first();
        return view('orientateurs.salle_pleniere')->with('salle', $salle);
    }

    public function rejoindre_salle_pleniere($id){
        $salle=Salle::find($id);
        if(\Bigbluebutton::isMeetingRunning($id)){
                return redirect()->to(
                    \Bigbluebutton::join([
                       'meetingID' => $id,
                       'userName' => Auth::user()->prenom .' '.Auth::user()->nom,
                       'password' =>  $salle->user->email."_attendeePW" //which user role want to join set password here
                    ])
                );
        }

        else{
            $message = "Attendez que le modérateur rejoigne la salle.";
            return view('orientateurs.salle_fermer',['message' => $message,"salle"=>$salle, "orientateur"=>$salle->user]);
       }

    }



    public function modifier(Request $request,$id){
        $salle= Salle::find($id);
        if($request->hasFile('standDeLaSalle')){
            $fileS = public_path('dist/files/stands/'.$salle->stand);
            if( File::exists($fileS)){
                File::delete($fileS);
            }
            $fichierStand = $request->file('standDeLaSalle');
            $new_fichier = time() .'_'.  str_replace(' ', '', $fichierStand->getClientOriginalName());
            $fichierStand->move('dist/files/stands/', $new_fichier);
        }

        if(!empty($new_fichier))
           $salle->stand=$new_fichier;

        $salle->nom=$request->input('inputNom');
        $salle->description=$request->input('inputDescription');
        $salle->lien_video=$request->input('inputLienVideo');
        $salle->save();
        return response()->json($salle);
    }

    public function demarrer(){
        $salle=Salle::where('user_id', Auth::user()->id)->first();
        //01- la creation de la salle bbb
        if(\Bigbluebutton::isMeetingRunning($salle->id) == true){
            $url=\Bigbluebutton::join([
                   'meetingID' => $salle->id,
                   'userName' => Auth::user()->prenom .' '.Auth::user()->nom,
                   'password' =>  Auth::user()->email."_moderator" //which user role want to join set password here
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
            //02- modification de la salle (is running)
            $salle->is_running=true;
            $salle->save();
        }
        return redirect()->to($url);
    }

    public function logout_bbb($id){
        $salle=Salle::find($id);
        if($salle->is_running==true && (Auth::user()->role == "orientateur" || Auth::user()->role == "admin" ) ){
            $salle->is_running=false;
            $salle->save();
            echo("Moderateur <br>");
        }
        return redirect()->to(route('profile.info'));
        //return back();
    }

}

