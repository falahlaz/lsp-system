<?php

namespace App\Http\Controllers;

use App\Tuk;
use Illuminate\Http\Request;

class TukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tuk::get();
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
            'type' => 'required',
            'name' => 'required',
            'address' => 'required',
            'status' => 'required',
        ]);

        // mengambil data inputan dan tambah data ke database
        Tuk::create([
            'code' => $request->code,
            'type' => $request->type,
            'name' => $request->name,
            'address' => $request->address,
            'status' => $request->status
        ]);

        //response
        $response = [
            'message' => 'Insert TUK success'
        ];

        return response()->json($response,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tuk  $tuk
     * @return \Illuminate\Http\Response
     */
    public function show(Tuk $tuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tuk  $tuk
     * @return \Illuminate\Http\Response
     */
    public function edit(Tuk $tuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tuk  $tuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validasi data yang diinput user
        $this->validate($request,[
            'code' => 'required',
            'type' => 'required',
            'name' => 'required',
            'address' => 'required',
            'status' => 'required',
        ]);

        // mengambil data inputan dan tambah data ke database
        Tuk::where('id',$id)->update([
            'code' => $request->code,
            'type' => $request->type,
            'name' => $request->name,
            'address' => $request->address,
            'status' => $request->status
        ]);
        
        //response
        $response = [
            'message' => 'Update TUK success'
        ];

        return response()->json($response,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tuk  $tuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tuk::destroy($id);

        //response
        $response = [
            'message' => 'Delete TUK success'
        ];

        return response()->json($response,200);
    }
}
