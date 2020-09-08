<?php

namespace App\Http\Controllers\Admin\Master;
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
        if(!\Session::has('id_user')) return redirect()->route('login');
        $data = \DB::table('m_scheme')->where('status', 1)->select('id', 'code', 'name')->get();
        // return response()->json($data,200);
        return view('admin.scheme.index',\compact('data'));
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
            'mea_status' => 'required'
        ]);

        // mengambil data inputan dan tambah data ke database
        Scheme::create([
            'code' => $request->code,
            'name' => $request->name,
            'category' => $request->category,
            'field' => $request->field,
            'mea_status' => $request->mea_status,
            'status' => 1
        ]);

        //response
        return \redirect()->route('admin.scheme.index');

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
    public function edit(Scheme $scheme)
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
        $data['scheme'] = \DB::table('m_scheme')->where('id',$scheme->id)->first();
        return view('admin.scheme.edit',\compact('data'));
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
            'mea_status' => 'required'
        ]);

        // mengambil data inputan dan tambah data ke database
        Scheme::where('id',$id)->update([
            'code' => $request->code,
            'name' => $request->name,
            'category' => $request->category,
            'field' => $request->field,
            'mea_status' => $request->mea_status
        ]);

        //response
        return \redirect()->route('admin.scheme.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Scheme::find($id)->update([
            'status' => 0
        ]);

        //response
        return \redirect()->route('admin.scheme.index');

    }
}
