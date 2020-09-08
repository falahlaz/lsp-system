<?php

namespace App\Http\Controllers\Admin\Master;
use App\Http\Controllers\Controller;

use App\UnitQuestion;
use Illuminate\Http\Request;

class UnitQuestionController extends Controller
{
	/**
     * Display a listing of the resource.
    	 *
     * @return \Illuminate\Http\Response
     */
	public function index()
	{
        return view('admin.question.index');
	}

	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function create()
	{

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
            'id_unit' => 'required',
            'status' => 'required',
        ]);

        // mengambil data inputan dan tambah data ke database
        UnitQuestion::create([
            'question' => $request->question,
            'id_unit' => $request->id_unit,
            'status' => $request->status,
        ]);

        //response
        $response = [
            'message' => 'Insert Unit Question success'
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
            'id_unit' => 'required',
            'status' => 'required',
        ]);

        // mengambil data inputan dan tambah data ke database
        UnitQuestion::where('id',$id)->update([
            'question' => $request->question,
            'id_unit' => $request->id_unit,
            'status' => $request->status,
        ]);

        //response
        $response = [
            'message' => 'Update Unit Question success'
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
        UnitQuestion::destroy($id);

        //response
        $response = [
            'message' => 'Delete Unit Question success'
        ];

        return response()->json($response,200);
    }
}
