<?php





namespace App\Http\Controllers\register;





use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\User;
use App\Region;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth ;

class RegisterController extends Controller{
    public function index(){

        $usr=Auth::user();
        $regions=Region::all();

        if($usr->role == "orientateur"){
            return view('orientateurs.profile')->with(['usr'=> $usr,'regions'=> $regions]);
        }

        if($usr->role == "intervenant"){
            //dd("Bonjour !");
            return view('intervenants.profile')->with(['usr'=> $usr,'regions'=> $regions]);
        }

        else if($usr->role == "participant"){
            return view('participants.profile')->with(['usr'=> $usr,'regions'=> $regions]);
        }

        else if($usr->role == "admin"){
            return view('admin.profiles.adminProfil')->with(['usr'=> $usr,'regions'=> $regions]);
        }


    }

    public function modifier(Request $request,$id){
        $user= User::find($id);
        $user->nom=$request->input('inputNom');
        $user->prenom=$request->input('inputPrenom');
        $user->email=$request->input('inputEmail');
        $user->tel=$request->input('inputTel');
        if($user->role=="admin"){
            if(!empty($request->input('pwd')))
               $user->password= Hash::make($request->input('pwd'));
        }
        else
           $user->password= Hash::make($request->input('inputEmail'));
        $user->region_id=$request->input('inputRegion');
        $user->save();
        return response()->json(["region" => $user->region, "user" => $user]);
    }


    public function redirctTo(){

        if(Auth::user()->role == "orientateur"){
            return redirect()->to(route('orientateur.salle'));
        }

        else if(Auth::user()->role == "intervenant"){
            return redirect()->to(route('intervenant.salle.pleniere'));
        }

        else if(Auth::user()->role == "participant"){
            return redirect()->to(route('participant.salle_ouvert'));
        }

        else if(Auth::user()->role == "admin"){
            return redirect()->to(route('orintateur.liste'));
        }
    }



    public function redirctToRegister(){

        if(Auth::user()->role == "orientateur"){
            return redirect()->to(route('orientateur.salle'));
        }
        else if(Auth::user()->role == "participant"){
            request()->session()->flash('message','Veuillez vérifier votre adresse e-mail');
            return redirect()->to(route('participant.salle_ouvert'));
        }
        else if(Auth::user()->role == "admin"){
            return redirect()->to(route('orintateur.liste'));
        }
    }


}



