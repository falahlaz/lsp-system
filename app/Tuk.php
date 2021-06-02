<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tuk extends Model
{
    //table intial
    protected $table = 'm_tuk';

    protected $guarded =[];

    public function asesor()
    {
        return $this->hasMany('App\Assessor', 'id_tuk');
    }
}

