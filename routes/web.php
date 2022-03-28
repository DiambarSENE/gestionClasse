<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('accueil');
});

/*

Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/index',"StudentController@index");
Route::get('/edit/{idEleve}',"StudentController@edit"); 
Route::get('/show/{idEleve}',"StudentController@show");
Route::get('/create',"StudentController@create");
Route::get('/store',"StudentController@store");
Route::get('/update/{idEleve}',"StudentController@update");

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('home');
})->name('home');



Route::get('/indexClasse ',"ClasseController@indexClasse");
Route::get('/editClasse/{id}',"ClasseController@editClasse"); 
Route::get('/showClasse/{id}',"ClasseController@showClasse");
Route::get('/createClasse',"ClasseController@createClasse");
Route::get('/storeClasse',"ClasseController@storeClasse");
Route::get('/updateClasse/{id}',"ClasseController@updateClasse");


Route::get('/indexMatiere ',"MatiereController@indexMatiere");
Route::get('/editMatiere/{id}',"MatiereController@editMatiere"); 
Route::get('/showMatiere/{id}',"MatiereController@showMatiere");
Route::get('/createMatiere',"MatiereController@createMatiere");
Route::get('/storeMatiere',"MatiereController@storeMatiere");
Route::get('/updateMatiere/{id}',"MatiereController@updateMatiere");


Route::get('/indexEvaluation ',"EvaluationController@indexEvaluation");
Route::get('/editEvaluation/{id}',"EvaluationController@editEvaluation"); 
Route::get('/showEvaluation/{id}',"EvaluationController@showEvaluation");
Route::get('/createEvaluation',"EvaluationController@createEvaluation");
Route::get('/storeEvaluation',"EvaluationController@storeEvaluation");
Route::get('/updateEvaluation/{id}',"EvaluationController@updateEvaluation");



Route::get('/indexBulletin ',"BulletinController@indexBulletin");
Route::get('/editBulletin/{id}',"BulletinController@editBulletin"); 
Route::get('/showBulletin/{id}',"BulletinController@showBulletin");
Route::get('/createBulletin',"BulletinController@createBulletin");
Route::get('/storeBulletin',"BulletinController@storeBulletin");
Route::get('/updateBulletin/{id}',"BulletinController@updateBulletin");