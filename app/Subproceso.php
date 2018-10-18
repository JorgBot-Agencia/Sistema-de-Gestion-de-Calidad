<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subproceso extends Model
{
     use SoftDeletes;
    //
            protected  $table ="subprocesos";
    protected  $fillable =['id',"nombre","descripcion", "proceso_id", "unir"];
    protected $dates = ['deleted_at'];

    public function proceso()
     {
         return $this->belongsTo('App\Proceso');
     }
     public function indicadore()
    {
        return $this->hasMany('App\Indicadore');
    }
}
