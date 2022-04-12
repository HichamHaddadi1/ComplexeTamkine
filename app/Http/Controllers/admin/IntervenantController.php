<?php

namespace App\Http\Controllers\admin;

use App\Edition;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Region;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Exports\IntervenantExport;
use Redirect;

class IntervenantController extends Controller
{
    //01-la list des intervenants
    public function index(){
        $users = User::where('role','=','intervenant')
        ->orderByDesc('created_at')
        ->paginate(10);
        return view('admin.intervenants.index',compact('users'));
    }
    //02-l'ajout
    public function store(Request $request){
        //validation
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required|email|unique:App\User,email',
            'tel'=>'required',
            'region'=>'required',
        ]);
        //L'insertion
        $user = new User([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'tel' => $request->input('tel'),
            'region_id' => $request->input('region'),
            'num_edition' => $request->input('num_edition'),
            'password' => Hash::make($request->input('email')),
            'role' => 'intervenant'
        ]);
        $user->save();
        $request->session()->flash('status','L\'intervenant est bien ajouté');
        return redirect()->route('admin.intervenants.index');
    }

    //03-la modification
    public function update($id,Request $request){
        //validation
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required',
            'tel'=>'required',
            'region'=>'required',
        ]);
        //La modification
        $user = User::findOrFail($id);
        $user->nom=$request->input('nom');
        $user->prenom=$request->input('prenom');
        $user->email=$request->input('email');
        $user->tel=$request->input('tel');
        $user->region_id=$request->input('region');
        $user->password=Hash::make($request->input('email'));
        $user->num_edition=$request->input('num_edition');
        $user->save();
        $request->session()->flash('status','L\'intervenant est bien edité');
        return redirect()->route('admin.intervenants.index');
    }

    //04-la supprission
    public function destroy($id,Request $request){
        if ($request->ajax()){
            $user = User::findOrFail($id);
            if ($user){
                $user->forceDelete();
                return response()->json(['success' => true]);
            }
        }
        $request->session()->flash('status','L\'édition est supprimée avec succès');
        return redirect()->route('admin.edition.index');
    }

    //05-la recherche
    public function rechercher(Request $request){
        $q = $request->input('q');
        $users= User::select('*')
                    ->where([['role','intervenant'],['email','LIKE','%'.$q.'%']])
                    ->orWhere([['role','intervenant'],['nom','LIKE','%'.$q.'%']])
                    ->orWhere([['role','intervenant'],['prenom','LIKE','%'.$q.'%']])
                    ->orWhere([['role','intervenant'],['nom','LIKE','%'.$q.'%']])
                    ->orderByDesc('created_at')
                    ->paginate(10)->withQueryString();
        return view('admin.intervenants.index')->with(['users' => $users,'q'=>$q]);
    }

    //06-exportation

    //07-l'action
    public function action($id){
        if($id == "-1")
          $type="creation";
        else
          $type="modification";

        $user = User::find($id);
        $editions=Edition::all();
        $regions = Region::all(['id', 'nom']);
        return view('admin.intervenants.action')->with(['user'=> $user,'type'=>$type,'regions'=>$regions,'editions'=>$editions]);
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
            return Excel::download(new IntervenantExport($dateDebut,$dateFin), 'intervenants_'.Carbon::now()->format("Y-m-d(H-i-s)").'.xlsx');
        }
    }//fin méthode export

}
