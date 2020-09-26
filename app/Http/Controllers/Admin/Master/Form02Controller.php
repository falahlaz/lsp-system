<?php

namespace App\Http\Controllers\Admin\Master;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Form02;
use App\UnitScheme;
use App\Element;

class Form02Controller extends Controller
{
    public function index($id_form01)
    {
        $id_schemes = \DB::table('t_scheme_form01')->select('id_scheme')->first();
        foreach($id_schemes as $id_scheme){
            $data['unit_scheme'] = UnitScheme::where('id_scheme',$id_scheme)->with('element')->get();
        }

        $data['id_form01'] = $id_form01;
        return view('participant.form02',\compact('data'));
    }
}
