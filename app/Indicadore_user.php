<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indicadore_user extends Model
{
	 use SoftDeletes;
    //
                 protected  $table ="indicadore_user";
        protected  $fillable =["user_id","indicadore_id", "privilegios"];
        protected $dates = ['deleted_at'];


}
