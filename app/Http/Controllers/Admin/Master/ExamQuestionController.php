<?php

namespace App\Http\Controllers\Admin\Master;
use App\Http\Controllers\Controller;

use App\ExamQuestion;
use Illuminate\Http\Request;

class ExamQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \DB::table('vw_exam_question')->select('id_e_question', 'question', 'scheme_name')->where('status', 1)->get();
        return response()->json($data, 200);
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
            'id_scheme' => 'required'
        ]);

        // mengambil data inputan dan tambah data ke database
        ExamQuestion::create([
            'question' => $request->question,
            'id_scheme' => $request->id_scheme,
            'status' => 1
        ]);

        //response
        $response = [
            'message' => 'Insert Exam Question success'
        ];

        return response()->json($response,201);
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
        return ExamQuestion::find($id);
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
        ExamQuestion::where('id',$id)->update([
            'question' => $request->question,
            'id_scheme' => $request->id_scheme
        ]);
        
        //response
        $response = [
            'message' => 'Update Exam Question success'
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
        ExamQuestion::find($id)->update([
            'status' => 0
        ]);

        //response
        $response = [
            'message' => 'Delete Exam Question success'
        ];

        return response()->json($response,200);
    }
}
