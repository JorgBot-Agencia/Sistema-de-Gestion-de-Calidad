<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proceso extends Model
{
   use SoftDeletes;
    //
        protected  $table ="procesos";
    protected  $fillable =['id',"nombre","descripcion"];
    protected $dates = ['deleted_at'];

    public function subproceso()
   {
       return $this->hasMany('App\Subproceso');
   }

   public function indicadore()
  {
      return $this->hasMany('App\Indicadore');
  }
}
