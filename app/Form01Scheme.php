<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form01Scheme extends Model
{
    protected $table = 't_scheme_form01';

    protected $guarded = [];

    public function form01Rel ()
    {
        return $this->belongsTo(Form01::class, 'id_form01','id');
    }
}
