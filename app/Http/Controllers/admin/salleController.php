<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Salle;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salles = Salle::select('salles.*')
                    ->join('users', 'users.id', '=', 'salles.user_id')
                    ->where([['users.role','orientateur']])
                    ->orderByDesc('created_at')
                    ->paginate(10);
        return view('admin.salles.index')->with('salles', $salles);
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
     * @param  \App\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function show($salle)
    {
        $salle = Salle::find($salle);
        return view('admin.salles.show',compact('salle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function edit($salle)
    {
        $salle = Salle::find($salle);
        $users = User::all();
        $regions = Region::all();

        return view('admin.salles.edit',compact('salle','regions','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $salle)
    {
        $room = Salle::find($salle);
        if($request->hasFile('standDeLaSalle')){
            $stand = $request->file('standDeLaSalle');
            $newstand = time() .'_'. str_replace(' ', '', $stand->getClientOriginalName());
            if(!empty($room->stand)){
                File::delete('dist/files/stands/'. $room->stand);
            }
            $stand->move('dist/files/stands/', $newstand);
            $room->fill([
                'stand' =>  $newstand,
            ]);
        }
        $room->fill([
            'nom' => $request->input('nomDeLaSalle'),
            'description' => $request->input('descriptionDeLaSalle'),
            'lien_video' => $request->input('videoDeLaSalle'),
            'user_id' => $request->user
            ]);
        $room->save();

        $request->session()->flash('status','Salle est bien édité');
        return redirect()->route('salles.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function destroy($salle,Request $request)
    {
        if ($request->ajax()){
            $salle = Salle::findOrFail($salle);

            if ($salle){
                $salle->forceDelete();
                return response()->json(['success' => true]);
            }

        }
    }

    public function enregistrements(){
        $recordsObject= \Bigbluebutton::getRecordings([
            'state' => 'published'
        ]);
        $enregistrements=array();
        foreach($recordsObject as $rec){
            if (!empty(Salle::find($rec["meetingID"])) &&  is_numeric($rec["meetingID"])){
                array_push($enregistrements, $rec);
            }
        }
        return view('admin.enregistrements.index',['recordsObject'=>$enregistrements]);
        //return view('admin.enregistrements.index',['recordsObject'=>$recordsObject]);
    }

    public function destroyEng($id){
        //dd($id);
        \Bigbluebutton::deleteRecordings([
            'recordID' => $id,
        ]);
        return back();
    }

}
