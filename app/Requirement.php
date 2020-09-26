<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $table = 't_requirement';

    protected $fillable = [
        'id_form01',
        'file_name',
        'name',
        'status',
    ];
}
