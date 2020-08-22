<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $guarded = [];


    // Un sondage appartient à un questionnaire
    public function questionnaire() {
        return $this->belongsTo(Questionnaire::class);
    }

    // Un sondage contient plusieurs réponses au sondage
    public function responses() {
        return $this->hasMany(SurveyResponse::class);
    }

}
