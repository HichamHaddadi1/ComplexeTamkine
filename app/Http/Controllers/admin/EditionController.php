<?php

namespace App\Http\Controllers\admin;

use App\Edition;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;

class EditionController extends Controller
{
    //01-la list des intervenants
    public function index(){
        $editions = Edition::select('*')
            ->orderByDesc('created_at')
            ->paginate(10);
        return view('admin.editions.index',compact('editions'));
    }
    //02-l'action
    public function action($id){
        if($id == "-1")
            $type="creation";
        else
            $type="modification";

        $edition = Edition::find($id);
        return view('admin.editions.action')->with(['edition'=> $edition,'type'=>$type]);
        //dd($edition);
    }
    //03-l'ajout
    public function store(Request $request){
        //validation
        $request->validate([
            'titre'=>'required',
            'description'=>'required',
            'date_debut'=>'required',
            'date_fin'=>'required'
        ]);
        //L'insertion
        $edition = new Edition([
            'titre' => $request->input('titre'),
            'description' => $request->input('description'),
            'date_debut' => $request->input('date_debut'),
            'date_fin' => $request->input('date_fin'),
            'slug' => Str::slug($request->input('titre'), '-')
        ]);
        $edition->save();
        $request->session()->flash('status','L\'édition est bien ajoutée');
        return redirect()->route('admin.editions.index');
    }

    //04-la modification
    public function update($id,Request $request){
        //validation
        $request->validate([
            'titre'=>'required',
            'description'=>'required',
            'date_debut'=>'required',
            'date_fin'=>'required'
        ]);
        //La modification
        $user = Edition::findOrFail($id);
        $user->titre=$request->input('titre');
        $user->description=$request->input('description');
        $user->date_debut=$request->input('date_debut');
        $user->date_fin=$request->input('date_fin');
        $user->slug= Str::slug($request->input('titre'), '-');
        $user->save();
        $request->session()->flash('status','L\'édition est bien editée');
        return redirect()->route('admin.editions.index');
    }

    //05-la supprission
    public function destroy($id,Request $request){
            try {
                $edition = Edition::findOrFail($id);
                $edition->forceDelete();
                $request->session()->flash('status','L\'édition est supprimée avec succès');
                return redirect()->route('admin.editions.index');
            } catch (\Exception $e) {
                $request->session()->flash('status','Impossible de supprimer cette édition car il est des relation avec d\'autre table !');
                return redirect()->route('admin.editions.index');
            }

    }

    //06-la recherche
    public function rechercher(Request $request){
        $q = $request->input('q');
        $editions= Edition::select('*')
            ->where('titre','LIKE','%'.$q.'%')
            ->orWhere('description','LIKE','%'.$q.'%')
            ->orderByDesc('created_at')
            ->paginate(10)->withQueryString();
        return view('admin.editions.index')->with(['editions' => $editions,'q'=>$q]);
    }

}
