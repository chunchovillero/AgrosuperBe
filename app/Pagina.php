<?php

namespace App;

use App\Tipo;
use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
       public function tipo(){
       	return $this->belongsTo(Tipo::class);
       }

       
   
}
