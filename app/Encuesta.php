<?php

namespace App;
use App\Pregunta;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
  	public function video(){
       	return $this->hasMany(Pregunta::class);
       }
}
