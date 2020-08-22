<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
   protected $guarded = [];

   public function user() {
        return $this->belongsTo(User::class);
   }

   // Quel est le type de relation entre une question et un questionnaire
   public function questions() {
        return $this->hasMany(Question::class);
   }
}
