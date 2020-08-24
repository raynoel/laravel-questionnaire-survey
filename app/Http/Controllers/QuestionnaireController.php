<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;

class QuestionnaireController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    
    // Formulaire pour créer un questionnaire
    public function create() {
        return view('questionnaire.create');
    }


    // Enregistre un questionnaire dans la DB
    public function store() {
        $data = request()->validate([
            'title' => 'required',
            'purpose' => 'required',
        ]);
        // auth()->user() obtient l'objet usagé
        // Utilise la relation pour exécuter la fonction create du model questionnaire

        $questionnaire = auth()->user()->questionnaires()->create($data);
        return redirect('/questionnaires/'.$questionnaire->id);
    }


    // Affiche un questionnaire
    public function show(Questionnaire $questionnaire) {
        $questionnaire->load('questions.answers');                    // Lazyload questions & answers
        // dd($questionnaire);                                           // relations: array ... affiche les rangées relationelles
        return view('questionnaire.show', compact('questionnaire')); 
    }
}
