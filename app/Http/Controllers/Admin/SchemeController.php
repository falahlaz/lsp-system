<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Scheme;
use Illuminate\Http\Request;

class SchemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Scheme::get();
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
            'code' => 'required',
            'name' => 'required',
            'category' => 'required',
            'field' => 'required',
            'mea_status' => 'required',
            'status' => 'required',
        ]);

        // mengambil data inputan dan tambah data ke database
        Scheme::create([
            'code' => $request->code,
            'name' => $request->name,
            'category' => $request->category,
            'field' => $request->field,
            'mea_status' => $request->mea_status,
            'status' => $request->status
        ]);

        //response
        $response = [
            'message' => 'Insert Scheme success'
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
            'code' => 'required',
            'name' => 'required',
            'category' => 'required',
            'field' => 'required',
            'mea_status' => 'required',
            'status' => 'required',
        ]);

        // mengambil data inputan dan tambah data ke database
        Scheme::where('id',$id)->update([
            'code' => $request->code,
            'name' => $request->name,
            'category' => $request->category,
            'field' => $request->field,
            'mea_status' => $request->mea_status,
            'status' => $request->status
        ]);
        
        //response
        $response = [
            'message' => 'Update Scheme success'
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
        Scheme::destroy($id);

        //response
        $response = [
            'message' => 'Delete Scheme success'
        ];
        return response()->json($response,200);
    }
}
