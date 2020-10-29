<?php

namespace App\Http\Controllers\Admin\Master;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Form02;
use App\Form02Answer;
use App\UnitScheme;
use App\Element;

class Form02Controller extends Controller
{
    public function index($token)
    {
        $data["apl02"]  =   Form02::where("token", $token)->first();
        $data['unit_scheme'] = UnitScheme::where('id_scheme', $data["apl02"]->schemeForm01Rel->id_scheme)->with('element')->get();
        $data['id_form02'] = $data["apl02"]->id;
        return view('participant.form02',\compact('data'));
    }

    public function store(Request $request)
    {
        foreach ($request->question as $question) {
            Form02Answer::create([
                "user_answer" => $question['answer'],
                "id_unit_question" => $question['id_unit_question'],
                "id_form02" => $request->id_form02
            ]);
        }
        $form02 = \DB::table('t_form02')->where('id', $request->id_form02);
        $form02->update([
                'status' => 2
        ]);
        $data["isSubmitted"] = true;
        return view('participant.form02',\compact('data'));
    }
}
