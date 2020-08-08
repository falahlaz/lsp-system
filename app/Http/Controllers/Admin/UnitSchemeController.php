<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\UnitScheme;
use Illuminate\Http\Request;

class UnitSchemeController extends Controller
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
            'code' => 'required',
            'name' => 'required',
            'pub_year' => 'required',
            'id_scheme' => 'required',
            'status' => 'required'
        ]);

        // mengambil data inputan dan tambah data ke database
        UnitScheme::create([
            'code' => $request->code,
            'name' => $request->name,
            'pub_year' => $request->pub_year,
            'id_scheme' => $request->id_scheme,
            'status' => $request->status
        ]);

        //response
        $response = [
            'message' => 'Insert Unit Scheme success'
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
            'pub_year' => 'required',
            'id_scheme' => 'required',
            'status' => 'required'
        ]);

        // mengambil data inputan dan tambah data ke database
        UnitScheme::where('id',$id)->update([
            'code' => $request->code,
            'name' => $request->name,
            'pub_year' => $request->pub_year,
            'id_scheme' => $request->id_scheme,
            'status' => $request->status
        ]);
        
        //response
        $response = [
            'message' => 'Update Unit Scheme success'
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
        UnitScheme::destroy($id);

        //response
        $response = [
            'message' => 'Delete Unit Scheme success'
        ];

        return response()->json($response,200);
    }
}
