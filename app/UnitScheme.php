<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitScheme extends Model
{
    protected $table = 'm_unit';

    protected $guarded =[];

    public function element(){
        return $this->hasMany('App\Element','id_unit');
    }
}
