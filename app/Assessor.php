<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessor extends Model
{
    protected $table = 'm_asesor';

    protected $guarded =[];

    public function scheme(){
        return $this->hasMany('App\Scheme','id_scheme');
    }

    public function user(){
        return $this->hasMany('App\User','id');
    }
}
