<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    protected $table = 'm_scheme';

    protected $guarded =[];
    protected $hidden = ['status', 'created_at', 'updated_at'];

    public function assessor(){
        return $this->belongsTo('App\Assessor','id_scheme');
    }

    public function unit()
    {
        return $this->hasMany('App\UnitScheme', 'id_scheme');
    }
}
