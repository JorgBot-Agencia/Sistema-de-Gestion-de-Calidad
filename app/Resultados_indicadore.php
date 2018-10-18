<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resultados_indicadore extends Model
{
	 use SoftDeletes;
    //
    protected $table ="resultados_indicadores";
  protected  $fillable =["indicadore_id", "proceso_id", "subproceso_id","fecha_inicio",
        "fecha_fin","periocidad","resultado","analisis","user_report","user_id",
        "periocidad_id","ciudad","meta"];
        protected $dates = ['deleted_at'];



       public function indicadore()
        {
            return $this->belongsTo('App\Indicadore');
        }


}
