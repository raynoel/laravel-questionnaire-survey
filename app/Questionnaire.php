<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
   protected $guarded = [];

   public function user() {
        return $this->belongsTo(User::class);
   }

   // Un questionnaire contient plusieurs questions
   public function questions() {
        return $this->hasMany(Question::class);
   }

   // Un questionnaire conteint plusieurs sondages
   public function surveys() {
     return $this->hasMany(Survey::class);
   }
}
