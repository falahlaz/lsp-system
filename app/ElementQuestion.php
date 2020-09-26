<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElementQuestion extends Model
{
    protected $table = 'm_element_question';

    protected $guarded =[];

    public function elemen(){
        return $this->belongsTo('App\Element','id_element');
    }
}
