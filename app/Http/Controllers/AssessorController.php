<?php

namespace App\Http\Controllers;

use App\Assessor;
use Illuminate\Http\Request;

class AssessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Assessor::with('scheme','tuk')->get();
        return response()->json($data,200);
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
            'name' => 'required',
            'reg_num' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'id_tuk' => 'required',
            'id_scheme' => 'required'
        ]);

        // mengambil data inputan dan tambah data ke database
        Assessor::create([
            'name' => $request->name,
            'reg_num' => $request->reg_num,
            'gender' => $request->gender,
            'address' => $request->address,
            'phone' => $request->phone,
            'status' => $request->status,
            'id_tuk' => $request->id_tuk,
            'id_scheme' => $request->id_scheme
        ]);

        //response
        $response = [
            'message' => 'Insert Assessor success'
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
            'name' => 'required',
            'reg_num' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'id_tuk' => 'required',
            'id_scheme' => 'required'
        ]);

        // mengambil data inputan dan tambah data ke database
        Assessor::where('id',$id)->update([
            'name' => $request->name,
            'reg_num' => $request->reg_num,
            'gender' => $request->gender,
            'address' => $request->address,
            'phone' => $request->phone,
            'status' => $request->status,
            'id_tuk' => $request->id_tuk,
            'id_scheme' => $request->id_scheme
        ]);
        
        //response
        $response = [
            'message' => 'Update Assessor success'
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
        Assessor::destroy($id);

        //response
        $response = [
            'message' => 'Delete Assessor success'
        ];

        return response()->json($response,200);
    }
}
