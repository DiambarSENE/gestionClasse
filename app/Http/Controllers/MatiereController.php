<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMatiere()
    {
        $matieres = Matiere::all();
        return view ('matiere',['matieres'=>$matieres,'layout'=>'indexMatiere']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMatiere()
    {
        $matieres = Matiere::all();
        return view('matiere',['matieres'=>$matieres,'layout'=>'createMatiere']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMatiere(Request $request)
    {
        $matiere = new Matiere();
        $validation = $request->validate([
             'nomM' => 'required|min:2|max:50',
             'type' => 'required|min:0|max:100' 
           
        ]);
        $matiere->nomM = $request->input('nomM');
       
         $matiere->type = $request->input('type');
        
        $matiere->save();
        return redirect('/indexMatiere');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showMatiere($id)
    {
        $matiere = Matiere::find($id);
        $matieres = Matiere::all();
        return view('matiere',['matieres'=>$matieres,'matiere'=>$matiere,'layout'=>'showMatiere']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editMatiere($id)
    {
        $matiere = Matiere::find($id);
        $matieres = Matiere::all();
        return view('matiere',['matieres'=>$matieres,'matiere'=>$matiere,'layout'=>'editMatiere']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMatiere(Request $request, $id)
    {
        $matiere = Matiere::find($id);
        $validation = $request->validate([
             'nomM' => 'required|min:2|max:50',
             'type' => 'required|min:10|min:0|max:100'
        ]);
        $matiere->nomM = $request->input('nomM');
       
        $matiere->type = $request->input('type');
       
        $matiere->save();
        return redirect('/indexMatiere');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMatiere($id)
    {
        $matiere = Matiere::find($id);
        $matiere->delete();
        return redirect('/indexMatiere');
    }
}
