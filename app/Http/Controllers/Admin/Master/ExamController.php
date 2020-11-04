<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ExamScore;
use App\ExamQuestion;
use App\ExamAnswer;
use App\Scheme;
use App\Form01;
use App\Form02;

class ExamController extends Controller
{
    public function index($token)
    {
        $data["exam"] = ExamScore::where("token", $token)->first();
        $data["apl02"] = Form02::find($data["exam"]->id_form02);
        $data["apl01"] = Form01::find($data["apl02"]->id_form01);
        $data["schema"] = Scheme::find($data["exam"]->id_scheme);;
        $data["questionList"] = ExamQuestion::where("id_scheme", $data["exam"]->id_scheme)->get();
        foreach ($data["questionList"] as $question) {
            $question["answerList"] = ExamAnswer::where("id_exam_question", $question->id)->get();
        }
        if (!isset($data["exam"]->start_exam)) {
            $startDate = date("Y-m-d H:i:s");
            $data["exam"]->start_exam = $startDate;
            $data["exam"]->save();
        }
        if (!isset($data["exam"]->end_exam)) {
            $endDate = new \DateTime(date("Y-m-d H:i:s"));
            $endDate->add(new \DateInterval('PT' . $data["exam"]->timeleft . 'M'));
            $data["exam"]->end_exam = $endDate->format('Y-m-d H:i:s');
            $data["exam"]->save();
        }
        return view('participant.exam',\compact('data'));
    }
}
