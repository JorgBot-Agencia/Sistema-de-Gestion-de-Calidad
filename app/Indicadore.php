<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indicadore extends Model
{
   use SoftDeletes;
    //
    protected  $table ="indicadores";
    protected  $fillable =['id',"indicador","proceso_id","subproceso_id","formula","frecuencia",
    "interpretacion","origen","funcionarios","user_id", "meta_cucuta","meta_bucaramanga"];
    protected $dates = ['deleted_at'];

    public function proceso()
     {
         return $this->belongsTo('App\Proceso');
     }

     public function subproceso()
      {
          return $this->belongsTo('App\Subproceso');
      }


      public function users()
{
    return $this->belongsToMany('App\User')
        ->withPivot("user_id","indicadore_id");
}



public function resultados_indicadore()
{
   return $this->hasMany('App\Resultados_indicadore');
}

}
