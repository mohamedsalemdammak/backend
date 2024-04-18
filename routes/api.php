<?php

use App\Http\Controllers\candidatcontroller;
use App\Http\Controllers\certificatcontroller;
use App\Http\Controllers\Controlleroffre;
use App\Http\Controllers\questioncontroller;
use App\Http\Controllers\recruteurcontroller;
use App\Http\Controllers\reponsecontroller;
use App\Http\Controllers\testtechniqueController;
use App\Http\Controllers\list_participantcontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Registercontroller;
use App\Models\testtechnique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/condidats',[candidatcontroller::class,'index']);
Route::post('/condidats_add',[candidatcontroller::class,'store']);
Route::post('/condidats/{id}', [candidatcontroller::class, 'update']);
Route::delete('/condidats_supprimer/{id}', [candidatcontroller::class,'destroy']);


Route::get('/testtechnique',[testtechniqueController::class,'index']);
Route::post('/testtechnique/{id}', [testtechniqueController::class, 'update']);
Route::delete('/testtechniquesupprimer/{id}', [testtechniqueController::class, 'destroy']);
Route::post('/testtechnique_add',[testtechniqueController::class,'store']);




Route::post('/recruteur_add',[recruteurcontroller::class,'store']);
Route::get('/recruteur',[recruteurcontroller::class,'index']);
Route::post('/recruteur/{id}', [recruteurcontroller::class, 'update']);
Route::delete('/recruteursupprimer/{id}', [recruteurcontroller::class,'destroy']);



Route::get('/offre',[Controlleroffre::class,'index']);
Route::post('/offre/{id}', [Controlleroffre::class, 'update']);
Route::delete('/offresupprimer/{id}', [Controlleroffre::class, 'destroy']);
Route::post('/offre_add',[Controlleroffre::class,'store']);


Route::get('/question',[questioncontroller::class,'index']);
Route::post('/question/{id}', [questioncontroller::class, 'update']);
Route::delete('/questionsupprimer/{id}', [questioncontroller::class, 'destroy']);
Route::post('/question_add',[questioncontroller::class,'store']);






Route::post('/reponse_add',[reponsecontroller::class,'store']);
Route::post('/reponse/{id}', [reponsecontroller::class, 'update']);
Route::delete('/reponsesupprimer/{id}', [reponsecontroller::class, 'destroy']);
Route::get('/reponse',[reponsecontroller::class,'index']);


Route::post('/certificat_add',[certificatcontroller::class,'store']);
Route::post('/certificats/{id}', [certificatcontroller::class, 'update']);
Route::delete('/certificatsupprimer/{id}', [certificatcontroller::class, 'destroy']);
Route::get('/certificat',[certificatcontroller::class,'index']);




Route::post('/listparticipant_add',[list_participantcontroller::class,'store']);
Route::put('/listparticipant/{id}', [list_participantcontroller::class, 'update']);
Route::delete('/listparticipantsupprimer/{id}', [list_participantcontroller::class, 'destroy']);
Route::get('/listparticipant',[list_participantcontroller::class,'index']);




route::post('/registercandiat',[Registercontroller::class,'storecandidat']);
route::post('/registerrecruteur',[Registercontroller::class,'storerecruteur']);
route::post('/login',[LoginController::class,'check']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
