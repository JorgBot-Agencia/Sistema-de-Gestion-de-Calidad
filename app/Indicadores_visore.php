<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indicadores_visore extends Model
{
	 use SoftDeletes;
    //
    protected  $table ="indicadores_visores";
    protected  $fillable =["user_id","indicadore_id"];
    protected $dates = ['deleted_at'];

  
}
