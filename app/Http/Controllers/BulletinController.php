<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Bulletin;
use Illuminate\Http\Request;

class BulletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexBulletin()
    {
        $eleve = Student::all();
        $bulletins = Bulletin::all();
        $bulletins = Bulletin::join('students','bulletins.eleve_id','=','students.id')->join('evaluations','students.id','=','evaluations.eleve_id')->get(['bulletins.*','students.identifiant','students.nom','students.prenom','students.sexe','students.date_naissance','evaluations.*']);
        #return view('evaluation',['evaluations'=>$evaluations,'eleve'=>$eleve,'matiere'=>$matiere,'layout'=>'indexEvaluation']);
        return view('bulletin',['bulletins'=>$bulletins,'eleve'=>$eleve,'layout'=>'indexBulletin']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBulletin()
    {
        $eleve = Student::all();
        $bulletins = Bulletin::all();
        $bulletins = Bulletin::join('students','bulletins.eleve_id','=','students.id')->join('evaluations','students.id','=','evaluations.eleve_id')->get(['bulletins.*','students.identifiant','students.nom','students.prenom','students.sexe','students.date_naissance','evaluations.*']);
        return view('bulletin',['bulletins'=>$bulletins,'eleve'=>$eleve,'layout'=>'createBulletin']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBulletin(Request $request)
    {
        $bulletin = new Bulletin();
        $validation = $request->validate([
             'compo' => 'required|',
        ]);
        $bulletin->eleve_id = $request->input('eleve_id');
        $bulletin->compo = $request->input('compo');
        $bulletin->save();
        return redirect('/indexBulletin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showBulletin($id)
    {
        $bulletin = Bulletin::find($id);
        $bulletins = Bulletin::all();
        $bulletins = Bulletin::join('students','bulletins.eleve_id','=','students.id')->join('evaluations','students.id','=','evaluations.eleve_id')->get(['bulletins.*','students.identifiant','students.nom','students.prenom','students.sexe','students.date_naissance','evaluations.*']);
        return view('bulletin',['bulletins'=>$bulletins,'bulletin'=>$bulletin,'layout'=>'showBulletin']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editBulletin($id)
    {
        $bulletin = Bulletin::find($id);
        $bulletins = Bulletin::all();
        return view('bulletin',['bulletins'=>$bulletins,'bulletin'=>$bulletin,'layout'=>'editBulletin']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBulletin(Request $request, $id)
    {
        $bulletin = Bulletin::find($id);
         $validation = $request->validate([
             'compo' => 'required|'
             
        ]);
        $bulletin->ecole = $request->input('compo');
        
        $bulletin->save();
        return redirect('/indexBulletin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyBulletin($id)
    {
        $bulletin = Bulletin::find($id);
        $bulletin->delete();
        return redirect('/indexBulletin');
    }
}
