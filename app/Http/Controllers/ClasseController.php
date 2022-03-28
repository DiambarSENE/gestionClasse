<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\User;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexClasse()
    {
        $us = User::all();
        $classes = Classe::all();
        return view ('classe',['classes'=>$classes,'us'=>$us,'layout'=>'indexClasse']);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createClasse()
    {
        $us = User::all();
        $classes = Classe::all();
        return view ('classe',['classes'=>$classes,'us'=>$us,'layout'=>'createClasse']);
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeClasse(Request $request)
    {
        $classe = new Classe();
         $validation = $request->validate([
             'nomClasse' => 'required|min:2|max:20',
             'dateClasse' => 'required|Date',
             'effectif' => 'required|' ,
             'description' => 'required|min:2|max:1000'
        ]);
        $classe->users_id = $request->input('users_id');
        $classe->nomClasse = $request->input('nomClasse');
        $classe->dateClasse = $request->input('dateClasse');
        $classe->effectif = $request->input('effectif');
        $classe->description = $request->input('description');
         $classe->save();
        return redirect('/indexClasse');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
      */ 
    public function showClasse($id)
    {
        $classe = Classe::find($id);
        $classes = Classe::all();
        return view('classe',['classes'=>$classes,'classe'=>$classe,'layout'=>'showClasse']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editClasse($id)
    {
        $us = User::all();
        $classe = Classe::find($id);
        $classes = Classe::all();
        return view('classe',['classes'=>$classes,'classe'=>$classe,'us'=>$us,'layout'=>'editClasse']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateClasse(Request $request, $id)
    {
        $classe = Classe::all($id);
         $validation = $request->validate([
             'nomClasse' => 'required|min:2|max:20',
             'dateClasse' => 'required|Date',
             'effectif' => 'required|min:10|max:70' ,
             'description' => 'required|min:2|max:1000'
        ]);
        $classe->users_id = $request->input('users_id');
        $classe->nomClasse = $request->input('nomClasse');
        $classe->dateClasse = $request->input('dateClasse');
        $classe->effectif = $request->input('effectif');
        $classe->description = $request->input('description');
        $classe->save();
        return redirect('/indexClasse');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyClasse($id)
    {
        $classe = Classe::find($id);
        $classe->delete();
        return redirect('/indexClasse');
    }
}
