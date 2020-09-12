<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ExamQuestion;
use App\ExamAnswer;

class ExamQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
        $data['question']   = \DB::table('vw_exam_question')->select('id_e_question', 'question', 'scheme_name')->where('status', 1)->get();
        $data['scheme']     = \DB::table('m_scheme')->select('id', 'name')->where('status', 1)->get();

        return view('admin.examQuestion.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi data yang diinput user
        $this->validate($request,[
            'question' => 'required',
            'id_scheme' => 'required',
            'answer' => 'required',
            'is_correct' => 'required',
        ]);

        // mengambil data inputan dan tambah data ke database
        $id_question = ExamQuestion::create([
            'question' => $request->question,
            'id_scheme' => $request->id_scheme,
            'status' => 1
        ])->id;

        foreach($request->answer as $answer) {
            if(!is_null($answer)) {
                ExamAnswer::create([
                    'id_exam_question' => $id_question,
                    'answer' => $answer,
                    'status' => 1,
                    'is_correct' => 0
                ]);
            }
        }

        ExamAnswer::where('answer', $request->is_correct)->update([
            'is_correct' => 1
        ]);

        return redirect()->route('admin.exam.question.index')->with('success', 'Data successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
        $data['answer']     = \DB::table('m_exam_answer')->select('id', 'answer', 'status', 'is_correct')->where([
            ['status', 1],
            ['id_exam_question', $id]
        ])->get();
        $data['scheme']     = \DB::table('m_scheme')->select('id', 'name')->where('status', 1)->get();
        $data['edit']       = ExamQuestion::find($id);

        return view('admin.examQuestion.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validasi data yang diinput user
        $this->validate($request,[
            'question' => 'required',
            'id_scheme' => 'required'
        ]);

        // mengambil data inputan dan tambah data ke database
        ExamQuestion::find($id)->update([
            'question' => $request->question,
            'id_scheme' => $request->id_scheme
        ]);

        return redirect()->route('admin.exam.question.index')->with('success', 'Data successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ExamQuestion::destroy($id);

        return redirect()->route('admin.exam.question.index')->with('success', 'Data successfully deleted!');
    }
}
