<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssessorScheme extends Model
{
    protected $table = 'm_asesor_scheme';

    protected $guarded = [];

    public function scheme()
    {
        return $this->belongsTo('App\Scheme', 'id_scheme');
    }

    public function asesor()
    {
        return $this->belongsTo('App\Assessor', 'id_asesor');
    }
}
