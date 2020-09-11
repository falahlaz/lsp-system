<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\UnitScheme;
use App\Scheme;

class UnitSchemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
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
        ]);

        // mengambil data inputan dan tambah data ke database
        UnitScheme::create([
            'code' => $request->code,
            'name' => $request->name,
            'pub_year' => $request->pub_year,
            'id_scheme' => $request->id_scheme,
            'status' => 1
        ]);

        return redirect()->route('admin.scheme.edit', ['scheme' => $request->id_scheme])->with('success', 'Data successfully added!');
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
        if(!\Session::has('id_user')) return redirect()->route('login');
        $data['edit']   = UnitScheme::find($id);
        $data['unit']   = \DB::table('m_unit')->select('id', 'code', 'name')->where('status', 1)->orderBy('name', 'asc')->get();
        
        return view('admin.unitScheme.edit', compact('data'));
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
        ]);

        // mengambil data inputan dan tambah data ke database
        $unit = UnitScheme::find($id);
        $unit->update([
            'code' => $request->code,
            'name' => $request->name,
            'pub_year' => $request->pub_year,
        ]);

        return redirect()->route('admin.scheme.edit', ['scheme' => $unit->id_scheme])->with('success', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit = UnitScheme::find($id);
        $unit->delete();

        return redirect()->route('admin.scheme.edit', ['scheme' => $unit->id_scheme])->with('success', 'Data successfully deleted!');
    }
}
