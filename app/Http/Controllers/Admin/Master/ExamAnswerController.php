<?php

namespace App\Http\Controllers\Admin\Master;
use App\Http\Controllers\Controller;

use App\ExamAnswer;
use Illuminate\Http\Request;

class ExamAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
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
            'id_exam_question' => 'required',
            'answer' => 'required'
        ]);

        // mengambil data inputan dan tambah data ke database
        ExamAnswer::create([
            'id_exam_question' => $request->id_exam_question,
            'answer' => $request->answer,
            'status' => 1,
            'is_correct' => 0
        ]);

        return redirect()->route('admin.exam.question.edit', ['question' => $request->id_exam_question])->with('success', 'Data successfully added!');
    }

    public function correctAnswer(Request $request)
    {
        $this->validate($request, [
            'is_correct' => 'required',
            'old_correct' => 'required',
            'id_exam_question' => 'required'
        ]);

        ExamAnswer::find($request->old_correct)->update([
            'is_correct' => 0
        ]);

        ExamAnswer::find($request->is_correct)->update([
            'is_correct' => 1
        ]);

        return redirect()->back()->with('success', 'Data successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ExamAnswer::select('id', 'answer', 'is_correct')->where([
            ['id_exam_question', $id],
            ['status', 1]
        ])->get();
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
            'id_exam_question' => 'required',
            'answer' => 'required',
            'status' => 'required',
            'is_correct' => 'required'
        ]);

        // mengambil data inputan dan tambah data ke database
        ExamAnswer::where('id',$id)->update([
            'id_exam_question' => $request->id_exam_question,
            'answer' => $request->answer,
            'status' => $request->status,
            'is_correct' => $request->is_correct

        ]);
        
        //response
        $response = [
            'message' => 'Update Exam Answer success'
        ];

        return response()->json($response,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $answer = ExamAnswer::find($id);
        $answer->delete();

        return redirect()->route('admin.exam.question.edit', ['question' => $answer->id_exam_question])->with('success', 'Data successfully deleted!');
    }
}
