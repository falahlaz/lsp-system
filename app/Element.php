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
}
