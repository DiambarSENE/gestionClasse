<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\User;
use App\Models\Matiere;
use App\Models\Student;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexEvaluation()
    {
        $eleve = Student::all();
        $matiere = Matiere::all();
        $classe = Classe::all();
        $users = User::all();
        $evaluations = Evaluation::all();
        $evaluations = Evaluation::join('students','evaluations.eleve_id','=','students.id')->join('matieres','matieres.id','=','evaluations.matiere_id')->get(['evaluations.*','students.identifiant','students.nom','students.prenom','students.sexe','matieres.nomM']);
        return view('evaluation',['evaluations'=>$evaluations,'eleve'=>$eleve,'users'=>$users,'classe'=>$classe,'matiere'=>$matiere,'layout'=>'indexEvaluation']);
         #return view('evaluation',compact($evaluations));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEvaluation()
    {  
        $eleve = Student::all();
        $matiere = Matiere::all();
        $evaluations = Evaluation::all();
         $classe = Classe::all();
        $users = User::all();
         $evaluations = Evaluation::join('students','evaluations.eleve_id','=','students.id')->join('matieres','matieres.id','=','evaluations.matiere_id')->get(['evaluations.*','students.identifiant','students.nom','students.prenom','students.sexe','matieres.nomM']);
        return view('evaluation',['evaluations'=>$evaluations,'users'=>$users,'classe'=>$classe,'eleve'=>$eleve,'matiere'=>$matiere,'layout'=>'createEvaluation']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEvaluation(Request $request)
    {
        $evaluation = new Evaluation();
         $validation = $request->validate([
             'voc' => 'required|min:0|max:20',
             'conj' => 'required|min:0|max:20',
             'gram' => 'required|min:0|max:20' ,
             'orth' => 'required|min:0|max:20',
             'AN' => 'required|min:0|max:20',
             'AM' => 'required|min:0|max:20',
             'AG' => 'required|min:0|max:20' 
            
        ]);
        $evaluation->eleve_id = $request->input('eleve_id');
        $evaluation->matiere_id = $request->input('matiere_id');
        $evaluation->trimestre = $request->input('trimestre');
        $evaluation->voc = $request->input('voc');
        $evaluation->conj = $request->input('conj');
        $evaluation->gram = $request->input('gram');
        $evaluation->orth = $request->input('orth');



        $evaluation->AN = $request->input('AN');
        $evaluation->AM = $request->input('AM');
        $evaluation->AG = $request->input('AG');
        $evaluation->RPR = $request->input('RPR');
        $evaluation->RPC = $request->input('RPC');

     
        $evaluation->DMR = $request->input('DMR');
        $evaluation->DMC = $request->input('DMC');


        $evaluation->EDDR = $request->input('EDDR');
        $evaluation->EDDC = $request->input('EDDC');


       
        $evaluation->AP = $request->input('AP');


        $evaluation->Arab = $request->input('Arab');
       
        $evaluation->save();
        return redirect('/indexEvaluation');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEvaluation($id)
    {
        $evaluation = Evaluation::find($id);
        $evaluations = Evaluation::all();
        return view('evaluation',['evaluations'=>$evaluations,'evaluation'=>$evaluation,'layout'=>'showEvaluation']);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editEvaluation($id)
    {
        $eleve = Student::all();
        $matiere = Matiere::all();
        $evaluation = Evaluation::find($id);
        $evaluations = Evaluation::all();
        return view('evaluation',['evaluations'=>$evaluations,'evaluation'=>$evaluation,'eleve'=>$eleve,'matiere'=>$matiere,'layout'=>'editEvaluation']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEvaluation(Request $request, $id)
    {
        $evaluation = Evaluation::find($id);
        $evaluation->trimestre = $request->input('trimestre');
        $evaluation->annee = $request->input('annee');
        $evaluation->note = $request->input('note');
        $evaluation->save();
        return redirect('/indexEvaluation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyEvaluation($id)
    {
        $evaluation = Evaluation::find($id);
        $evaluation->delete();
        return redirect('/indexEvaluation');
    }
}
