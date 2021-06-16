<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TukScheme extends Model
{
    protected $table = "m_tuk_scheme";
    protected $guarged = [];
    protected $hidden = ['status', 'created_at', 'updated_at'];
}
