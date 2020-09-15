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
        if(!\Session::has('id_user')) return redirect()->route('login');
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

        return \redirect()->route('admin.tuk.index')->with('success', 'Data successfully added!');
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
        if(!\Session::has('id_user')) return redirect()->route('login');
        $data['tuk'] = \DB::table('m_tuk')->where('id',$tuk->id)->first();
        $data['type'] = ['Sewaktu','Mandiri','Tempat Kerja'];

        return view('admin.tuk.edit',\compact('data'));
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
        return \redirect()->route('admin.tuk.index')->with('success', 'Data successfully updated!');
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

        return \redirect()->route('admin.tuk.index')->with('success', 'Data successfully deleted!');
    }
}
