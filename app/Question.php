<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    // Quel est le type de relation entre une question et un questionnaire?
    public function questionnaire() {
        return $this->belongsTo(Questionnaire::class);
    }

    // Quel est le type de relation entre une réponse et une question
    public function answers() {
        return $this->hasMany(Answer::class);
    }


}
