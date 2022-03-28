<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Student; 
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $classe = Classe::all();
        $students = Student::all();
        return view('student ',['students'=>$students,'classe'=>$classe,'layout'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classe =Classe::all();
        $students = Student::all();
        return view('student ',['students'=>$students,'classe'=>$classe,'layout'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();
        $student->classe_id = $request->input('classe_id');
         $validation = $request->validate([
             'identifiant' => 'required|min:8|max:8',
             'nom' => 'required|min:2|max:20',
             'prenom' => 'required|min:2|max:20' ,
             'sexe' => 'required|min:2|max:20',
             'date_naissance' => 'required|Date',
             'lieu_de_naissance' => 'required|min:2|max:20'
        ]);
        $student->identifiant = $request->input('identifiant'); 
        $student->nom = $request->input('nom');
        $student->prenom = $request->input('prenom');
        $student->sexe = $request->input('sexe');
        $student->date_naissance = $request->input('date_naissance');
        $student->lieu_de_naissance = $request->input('lieu_de_naissance');
        $student->telephone_parent = $request->input('telephone_parent');
        $student->email_parent = $request->input('email_parent');
       
        $student->save();
        return redirect('/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student  = Student::find($id);
        $students = Student::all();
        return view('student',['students'=>$students,'student'=>$student,'layout'=>'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classe = Classe::all();
        $student  = Student::find($id);
        $students = Student::all();
        return view('student',['students'=>$students ,'student'=>$student,'classe'=>$classe,'layout'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        $student = Student::find($id);
        $validation = $request->validate([
             'identifiant' => 'required|min:8|max:8',
             'nom' => 'required|min:2|max:20',
             'prenom' => 'required|min:2|max:20' ,
             'sexe' => 'required|min:2|max:20',
             'date_naissance' => 'required|Date',
             'lieu_de_naissance' => 'required|min:2|max:20'
        ]);
        $student->classe_id = $request->input('classe_id');
        $student->identifiant = $request->input('identifiant');
        $student->nom = $request->input('nom');
        $student->prenom = $request->input('prenom');
        $student->sexe = $request->input('sexe');
        $student->date_naissance = $request->input('date_naissance');
        $student->lieu_de_naissance = $request->input('lieu_de_naissance');
        $student->telephone_parent = $request->input('telephone_parent');
        $student->email_parent = $request->input('email_parent');
        $student->save();
        return redirect('/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $student = Student::find($id);
         $student->delete();
         return redirect('/index');
    }
}
