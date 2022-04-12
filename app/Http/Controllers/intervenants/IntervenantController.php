<?php

namespace App\Http\Controllers\intervenants;

use App\Http\Controllers\Controller;
use App\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IntervenantController extends Controller
{
    public function salle_pleniere(){
        $salle=Salle::where('id', 1)->first();
        return view('intervenants.salle_pleniere')->with('salle', $salle);
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
            return view('intervenants.salle_fermer',['message' => $message,"salle"=>$salle, "orientateur"=>$salle->user]);
        }

    }
}
