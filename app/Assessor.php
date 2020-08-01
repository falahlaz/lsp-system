<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessor extends Model
{
    protected $table = 'm_asesor';

    protected $guarded =[];

    public function scheme(){
        return $this->belongsTo('App\Scheme','id_scheme');
    }

    public function tuk(){
        return $this->belongsTo('App\Tuk','id_tuk');
    }
}
