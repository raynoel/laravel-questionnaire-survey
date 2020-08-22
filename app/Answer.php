<?php

namespace App;
use App\Question;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = [];

    // Quel est le type de relation entre une réponse et une question
    public function question() {
        return $this->belongsTo(Question::class);
    }
}
