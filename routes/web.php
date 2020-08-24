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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Questionnaire Controller
Route::get('/questionnaires/create', 'QuestionnaireController@create');                         // Formulaire pour ajouter un formulaire
Route::post('/questionnaires', 'QuestionnaireController@store');                                // Ajoute le formulaire dans la DB
Route::get('/questionnaires/{questionnaire}', 'QuestionnaireController@show');                  // Affiche un formulaire

// Question Controller
Route::get('/questionnaires/{questionnaire}/questions/create', 'QuestionController@create');    // Formulaire pour ajouter une question au formulaire
Route::post('/questionnaires/{questionnaire}/questions', 'QuestionController@store');           // Ajoute une question dans la DB
Route::delete('/questionnaires/{questionnaire}/questions/{question}', 'QuestionController@destroy'); // Supprime une question

Route::get('/surveys/{questionnaire}-{slug}', 'SurveyController@show'); 
Route::post('/surveys/{questionnaire}-{slug}', 'SurveyController@store');