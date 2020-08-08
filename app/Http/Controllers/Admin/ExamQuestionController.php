<?php

namespace App\Http\Controllers;
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
        //
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
            'status' => 'required',
        ]);

        // mengambil data inputan dan tambah data ke database
        ExamQuestion::create([
            'question' => $request->question,
            'id_scheme' => $request->id_scheme,
            'status' => $request->status,
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
        //
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
            'id_scheme' => 'required',
            'status' => 'required',
        ]);

        // mengambil data inputan dan tambah data ke database
        ExamQuestion::where('id',$id)->update([
            'question' => $request->question,
            'id_scheme' => $request->id_scheme,
            'status' => $request->status,
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
        ExamQuestion::destroy($id);

        //response
        $response = [
            'message' => 'Delete Exam Question success'
        ];

        return response()->json($response,200);
    }
}
