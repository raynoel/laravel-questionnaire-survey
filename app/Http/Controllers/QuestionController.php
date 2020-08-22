<?php

namespace App\Http\Controllers;

use App\Question;
use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    

    public function create(Questionnaire $questionnaire) {
        return view('question.create', compact('questionnaire'));
    }


    public function store(Questionnaire $questionnaire, Request $request) {
        // dd($request->all());
        $data = request()->validate([ 
            'question.question' => 'required',
            'answers.*.answer' => 'required'
        ]);
        // $question contiendra le modèle Question
        $question = $questionnaire->questions()->create($data['question']); // Cré 1 rangée question en prenant en compte la relation avec le questionnaire
        $question->answers()->createMany($data['answers']);                  // Cré x rangées answers en prenant en compte la relation avec la question
        dd($questionnaire->id);
        return redirect('/questionnaires/' . $questionnaire->id);
    }

}
