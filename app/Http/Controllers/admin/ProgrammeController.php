<?php

namespace App\Http\Controllers\admin;

use App\Edition;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Programme;
use Illuminate\Support\Facades\File;

class ProgrammeController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(){
        $programmes = Programme::paginate(10);
//        $programmes = Programme::select('programmes.*','editions.titre')
//            ->join('editions', 'editions.id', '=', 'programmes.num_edition')
//            ->orderByDesc('created_at')
//            ->paginate(10);
        $editions=Edition::all();
        return view('admin.programmes.index')->with('programmes', $programmes);
    }

    public function action($id){
        if($id == "-1")
          $type="creation";
        else
          $type="modification";

        $pro = Programme::find($id);
        $editions=Edition::all();
        return view('admin.programmes.action')->with(['programme'=> $pro,'type'=>$type,'editions'=>$editions]);
    }

    public function store(Request $request){
        $request->validate([
            'titre'=>'required',
            'description'=>'required',
            // 'date'=>'required',
            'photo'=>'required|max:10000|mimes:png,jpg',
            'fichier'=>'required|max:20000|mimes:doc,docx,pdf',
        ]);
        //
        $newphoto=null;
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $newphoto = time() .'_'. str_replace(' ', '', $photo->getClientOriginalName());
            $photo->move('dist/files/programmes/imgs/', $newphoto);
            print_r($newphoto."<br>");
        }
        //
        $newfichier=null;
        if($request->hasFile('fichier')){
            $fichier = $request->file('fichier');
            $newfichier = time() .'_'. str_replace(' ', '', $fichier->getClientOriginalName());
            $fichier->move('dist/files/programmes/fichieres/', $newfichier);
        }
        //
        $pro=new Programme([
            'titre' => $request->input('titre'),
            'description' => $request->input('description'),
            'num_edition' => $request->input('num_edition'),
            // 'date' => $request->input('date'),
            'photo' => $newphoto,
            'lien' => $newfichier
        ]);
        $pro->save();

        $request->session()->flash('status','Le programme est ajouté avec succès');
        return redirect()->route('admin.programmes.index');
    }

    public function rechercher(Request $request){
        $q = $request->input('q');
        $programmes = Programme::select('*')
                        ->where('titre','LIKE','%'.$q.'%')
                        ->orWhere('description','LIKE','%'.$q.'%')
                        ->orderByDesc('created_at')
                        ->paginate(10)->withQueryString();
        return view('admin.programmes.index')->with(['programmes' => $programmes,'q'=>$q]);
    }

    public function destroy($id,Request $request){
            $pro = Programme::find($id);
            if ($pro){
                $pro->forceDelete();
                //02-la supprission de fichiere
                $oldfichier= public_path('dist/files/programmes/fichieres/'.$pro->lien);
                if( File::exists($oldfichier)){
                    File::delete($oldfichier);
                }
                //03-la supprission d'image
                $oldphoto = public_path('dist/files/programmes/imgs/'.$pro->photo);
                if( File::exists($oldphoto)){
                    File::delete($oldphoto);
                }
                $request->session()->flash('status','Le programme est supprimé avec succès');
                return redirect()->route('admin.programmes.index');
            }
    }

    public function update($id,Request $request){
        $request->validate([
            'titre'=>'required',
            'description'=>'required',
            // 'date'=>'required',
            'photo'=>'max:10000|mimes:png,jpg',
            'fichier'=>'max:10000|mimes:doc,docx,pdf',
        ]);
        $pro = Programme::find($id);
        if ($pro){
            $pro->titre=$request->input('titre');
            $pro->description=$request->input('description');
            $pro->num_edition=$request->input('num_edition');
            //$pro->date=$request->input('date');
            if($request->hasFile('photo')){
                //01-la supprission
                $oldphoto = public_path('dist/files/programmes/imgs/'.$pro->photo);
                if( File::exists($oldphoto)){
                    File::delete($oldphoto);
                }
                //02-l'ajout
                $photo = $request->file('photo');
                $newphoto = time() .'_'. str_replace(' ', '', $photo->getClientOriginalName());
                $photo->move('dist/files/programmes/imgs/', $newphoto);
                $pro->photo=$newphoto;
            }
            if($request->hasFile('fichier')){
                //01-la supprission
                $oldfichier= public_path('dist/files/programmes/fichieres/'.$pro->lien);
                if( File::exists($oldfichier)){
                    File::delete($oldfichier);
                }
                //02-l'ajout
                $fichier = $request->file('fichier');
                $newfichier = time() .'_'. str_replace(' ', '', $fichier->getClientOriginalName());
                $fichier->move('dist/files/programmes/fichieres/', $newfichier);
                $pro->lien=$newfichier;
            }
            $pro->save();
            $request->session()->flash('status','Le programme est modifié avec succès');
            return redirect()->route('admin.programmes.index');
        }
}

}
