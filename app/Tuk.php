<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tuk extends Model
{
    //table intial
    protected $table = 'm_tuk';

    protected $guarded =[];
    protected $hidden = ['status', 'created_at', 'updated_at'];

    public function asesor()
    {
        return $this->hasMany('App\Assessor', 'id_tuk');
    }

    public function tukScheme()
    {
        return $this->hasMany('App\TukScheme', 'id_tuk');
    }
}

