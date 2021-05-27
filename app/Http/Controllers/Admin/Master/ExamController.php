<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ExamScore;
use App\ExamQuestion;
use App\ExamAnswer;
use App\ExamUserAnswer;
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
        $data["schema"] = Scheme::find($data["exam"]->id_scheme);
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
        } else {
            if (strtotime(date("Y-m-d H:i:s")) > strtotime($data["exam"]->end_exam)) {
                return view('participant.examFinish',\compact('data'));
            }
        }
        return view('participant.exam',\compact('data'));
    }

    public function store (Request $request, $token) 
    {
        $data["exam"] = ExamScore::where("token", $token)->first();
        $data["apl02"] = Form02::find($data["exam"]->id_form02);
        $data["apl01"] = Form01::find($data["apl02"]->id_form01);
        $data["schema"] = Scheme::find($data["exam"]->id_scheme);;
        $data["questionList"] = ExamQuestion::where("id_scheme", $data["exam"]->id_scheme)->get();
        $valueQuestion = 100 / count($data["questionList"]);
        $totalScore = 0;
        foreach ($request->answerList as $answer) {
            $examAnswerUser = new ExamUserAnswer();
            $examAnswerUser->id_exam_score = $data["exam"]->id;
            $examAnswerUser->id_exam_question = $answer["question"];
            if (isset($answer["answer"])) {
                $examAnswer = ExamAnswer::find($answer["answer"]);
                $totalScore += ($examAnswer->is_correct == 1 ? $valueQuestion : 0);
                $examAnswerUser->id_exam_answer = $answer["answer"];
            }
            $examAnswerUser->save();
        }
        $data["exam"]->score = $totalScore;
        $data["exam"]->end_exam = date("Y-m-d H:i:s");
        $data["exam"]->status = 2;
        $data["exam"]->save();
        return view('participant.examFinish',\compact('data'));
    }
}
