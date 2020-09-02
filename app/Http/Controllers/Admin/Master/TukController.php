<?php

namespace App\Http\Controllers\Admin\Master;
use App\Http\Controllers\Controller;

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
        $data = \DB::table('m_tuk')->select('id', 'code', 'name', 'type')->where('status', 1)->get();
        // return response()->json($data,200);
        return view('admin.tuk.index',\compact('data'));
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
            'address' => 'required'
        ]);

        // mengambil data inputan dan tambah data ke database
        Tuk::create([
            'code' => $request->code,
            'type' => $request->type,
            'name' => $request->name,
            'address' => $request->address,
            'status' => 1
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
        return $tuk;
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
            'address' => 'required'
        ]);

        // mengambil data inputan dan tambah data ke database
        Tuk::where('id',$id)->update([
            'code' => $request->code,
            'type' => $request->type,
            'name' => $request->name,
            'address' => $request->address
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
        Tuk::find($id)->update([
            'status' => 0
        ]);

        //response
        $response = [
            'message' => 'Delete TUK success'
        ];

        return response()->json($response,200);
    }
}
