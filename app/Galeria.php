<?php

namespace App;
use App\Video;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
  	public function video(){
       	return $this->hasMany(Video::class);
       }
}
