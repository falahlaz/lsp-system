<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    protected $table = 'm_scheme';

    protected $guarded =[];

    public function assessor(){
        return $this->hasMany('App\Assessor','id_scheme');
    }
}
