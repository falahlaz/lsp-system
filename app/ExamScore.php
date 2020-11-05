<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamScore extends Model
{
    protected $table = 't_exam_score';

    protected $guarded =[];

    public function form02Rel ()
    {
        return $this->belongsTo(Form02::class, 'id_form02','id');
    }
}
