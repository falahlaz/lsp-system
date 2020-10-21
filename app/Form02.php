<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form02 extends Model
{
    protected $table = 't_form02';

    protected $guarded = [];

    public function schemeForm01Rel ()
    {
        return $this->belongsTo(Form01Scheme::class, 'id_scheme_form01','id');
    }
}
