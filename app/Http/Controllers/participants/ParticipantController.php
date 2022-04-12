<?php

namespace App\Http\Controllers\participants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Salle;
use App\Region;
use Auth;

class ParticipantController extends Controller
{
    public function salles_ouverts(){
        //01-
         $salles=Salle::all();
         foreach($salles as $sal){
             if(\Bigbluebutton::isMeetingRunning($sal->id)){
                 $sal->is_running=true;
                 $sal->save();
             }
             else{
                 $sal->is_running=false;
                 $sal->save();
             }
         }
        //02-
        $regions=Region::all();
        $salles_ouvertes=Salle::where([['id', '!=', 1],['is_running', true]])->paginate(8);
        return view('participants.salles_ouverts')->with(['salles_ouvertes'=> $salles_ouvertes,'regions'=> $regions,'q'=> "",'typeRecherche'=>'globale','type'=>'salles.nom']);
    }

    public function salles(){
        $salles_fermees=Salle::where([['id', '!=', 1],['is_running', false]])->paginate(8);
        $regions=Region::all();
        return view('participants.salles_fermees')->with(['salles_fermees'=> $salles_fermees,'regions'=> $regions,'q'=> "",'typeRecherche'=>'globale','type'=>'salles.nom']);
    }

    public function rejoindre($id){
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
            return view('participants.salle_fermer',['message' => $message,"salle"=>$salle, "orientateur"=>$salle->user]);
       }
    }

    public function recherche_salles_fermees_globale(Request $request){
        $q = $request->input('q');
        $type=$request->input('inputTypeRecherche');
        $regions=Region::all();
        if($type!="tous"){
            $salles = Salle::selectRaw('salles.*')
            ->join('users', 'users.id', '=', 'salles.user_id')
            ->where([[ $type ,'LIKE','%'.$q.'%'],['is_running',false],['salles.id', '!=', 1]])
            ->paginate(8)->withQueryString();
        }
        else{
            $q="";
            $salles = Salle::where([['is_running',false],['salles.id', '!=', 1]])->paginate(8)->withQueryString();
        }

        return view('participants.salles_fermees')->with(['salles_fermees'=> $salles,'regions'=> $regions,'q'=> $q,'typeRecherche'=>'globale','type'=>$type]);
    }

    public function recherche_salles_fermees_regions(Request $request){
        $q = $request->input('inputRegion');
        $regions=Region::all();
        $salles = Salle::selectRaw('salles.*')
                  ->join('users', 'users.id', '=', 'salles.user_id')
                  ->where([['users.region_id',$q],['is_running',false],['salles.id', '!=', 1]])
                  ->paginate(8)->withQueryString();
        return view('participants.salles_fermees')->with(['salles_fermees'=> $salles,'regions'=> $regions,'q'=> $q,'typeRecherche'=>'regions','type'=>'']);
    }


    public function recherche_salles_ouverts_globale(Request $request){
        $q = $request->input('q');
        $type=$request->input('inputTypeRecherche');
        $regions=Region::all();
        if($type!="tous"){
            $salles = Salle::selectRaw('salles.*')
            ->join('users', 'users.id', '=', 'salles.user_id')
            ->where([[ $type ,'LIKE','%'.$q.'%'],['is_running',true],['salles.id', '!=', 1]])
            ->paginate(8)->withQueryString();
        }
        else{
            $q="";
            $salles = Salle::where([['is_running',true],['salles.id', '!=', 1]])->paginate(8)->withQueryString();
        }

        return view('participants.salles_ouverts')->with(['salles_ouvertes'=> $salles,'regions'=> $regions,'q'=> $q,'typeRecherche'=>'globale','type'=>$type]);
    }

    public function recherche_salles_ouverts_regions(Request $request){
        $q = $request->input('inputRegion');
        $regions=Region::all();
        $salles = Salle::selectRaw('salles.*')
                  ->join('users', 'users.id', '=', 'salles.user_id')
                  ->where([['users.region_id',$q],['is_running',true],['salles.id', '!=', 1]])
                  ->paginate(8)->withQueryString();
        return view('participants.salles_ouverts')->with(['salles_ouvertes'=> $salles,'regions'=> $regions,'q'=> $q,'typeRecherche'=>'regions','type'=>'']);
    }

}
