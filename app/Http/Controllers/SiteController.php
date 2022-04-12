<?php



namespace App\Http\Controllers;

use App\Edition;
use App\Mail\ContactMail;

use App\Programme;
use App\Region;
use App\Salle;
use App\User;
use Response;

use Illuminate\Http\Request;

use Mail;

class SiteController extends Controller{



    function getNationalUniversity($id)
    {
        $universities = User::where('role' , 'orientateur')
        ->where('region_id' , $id)
        ->join('salles' , 'salles.user_id' , 'users.id')
        ->whereNotIn('salles.id', array(1))
        ->paginate(4);
        return response()->json($universities , 200);
    }
    public function index(){
        // $salles = Salle::orderBy('id', 'desc')->take(3)->get();
        $salles = Salle::where('id' ,'!=','1')->orderBy('created_at', 'asc')
        ->paginate(4);
        $regions =Region::all();
        // dd($salles->pluck('region_id'));
        return view('front.home', compact('salles' , 'regions'));

    }

    public function salle(){
        $salles = Salle::where('id' ,'!=','1')->orderBy('created_at', 'asc')->paginate(8);
        return view('front.salle', compact('salles'));
    }

    public function download(){

        return view('front.program_2021');

    }

//    public function programs()
//
//    {
//
//        return view('front.download');
//
//    }

    public function downloadAR(){
        $file = public_path().'/front/pdf/Dossier_de_comm_Arabe_Lundi_14_09_2020.pdf';
        $headers = array('Content-Type: application/pdf');
        return Response::download($file, 'Dossier de comm Arabe Lundi 14-09-2020.pdf', $headers);
    }

    public function downloadFR(){
        $file = public_path().'/front/pdf/Dossier_de_comm_francais_Lundi-14-09-2020.pdf';
        $headers = array('Content-Type: application/pdf');
        return Response::download($file, 'Dossier de comm français Lundi 14-09-2020.pdf', $headers);
    }



    public function download_2021(){
        $file = public_path().'/front/pdf/Programme.pdf';
        $headers = array('Content-Type: application/pdf');
        return Response::download($file, 'Programme.pdf', $headers);
    }

    public function programme_2020(){
        return view('front.program_2020');
    }

    public function programme_2021(){
        return view('front.program_2021');
    }

    public function programs(){
        $editions =  Edition::all();
        $programs = Programme::where('num_edition',Edition::latest()->first()->id)->get();
        $id_ed=Edition::latest()->first()->id;
        return view('front.program', compact('editions','programs','id_ed'));
    }

    public function edition($slug){
        $edition = Edition::where('slug',$slug)->first();
        $programs = Programme::where('num_edition',$edition->id)->get();
        $editions =  Edition::all();
        $id_ed=$edition->id;
//        dd($programs);
//        return response()->json(['editions' => $editions]);
        return view('front.program', compact('editions','programs','id_ed'));
    }

    public function contact(){
        return view('front.contact');
    }

    public function contactSubmit(Request $request){
        $data = $request->validate([
            'nom' => 'required|string|min:2|max:30',
            'prenom' => 'required|string|min:2|max:30',
            'email' => 'required|email',
            'msg' => 'required|min:5|max:500',
        ]);

        //dd($data);
        Mail::to("orientation.tamkine@gmail.com")->send(new ContactMail($data));
        return back()->with('success' ,'Nous reviendrons vers vous sous peu.');
    }

}
