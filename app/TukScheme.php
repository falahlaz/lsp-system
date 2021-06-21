<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TukScheme extends Model
{
    protected $table = "m_tuk_scheme";
    protected $fillable = ['id_tuk', 'id_scheme', 'status'];
    protected $hidden = ['status', 'created_at', 'updated_at'];

    public function tuk()
    {
        return $this->belongsTo("App\Tuk", 'id_tuk');
    }

    public function scheme()
    {
        return $this->belongsTo("App\Scheme", "id_scheme");
    }
}
