<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    protected $table = 'm_element';

    protected $fillable = [
        'id_unit',
        'name',
        'status'
    ];

    public function unit(){
        return $this->belongsTo('App\UnitScheme','id_unit');
    }

    public function question(){
        return $this->hasMany('App\ElementQuestion','id_element');
    }
}
