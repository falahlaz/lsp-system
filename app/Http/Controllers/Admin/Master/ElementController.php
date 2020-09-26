<?php

namespace App\Http\Controllers\Admin\Master;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Element;
use App\User;

class ElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
        $data['user'] = User::find(\Session::get('id_user'));
        $data['unit']       = \DB::table('m_unit')->select('id', 'name')->where('status', 1)->orderBy('name', 'asc')->get();
        $data['element']    = \DB::table('vw_element')->select('id', 'name', 'unit')->where('status', 1)->orderBy('name', 'asc')->get();

        return view('admin.element.index', compact('data'));
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
        $this->validate($request, [
            'id_unit' => 'required',
            'name' => 'required'
        ]);

        foreach($request->name as $name) {
            Element::create([
                'id_unit' => $request->id_unit,
                'name' => $name,
                'status' => 1,
            ]);
        }

        return redirect()->route('admin.element.index')->with('success', 'Data successfully added!')->withInput(['id_unit' => $request->id_unit]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
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
        $data['user'] = User::find(\Session::get('id_user'));
        $data['unit']       = \DB::table('m_unit')->select('id', 'name')->where('status', 1)->orderBy('name', 'asc')->get();
        $data['question']   = \DB::table('m_element_question')->select('id', 'question', 'status')->orderBy('question', 'asc')->get();
        $data['element']    = Element::find($id);

        return view('admin.element.edit', compact('data'));
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
        $this->validate($request, [
            'id_unit' => 'required',
            'name' => 'required'
        ]);

        Element::find($id)->update([
            'id_unit' => $request->id_unit,
            'name' => $request->name,
        ]);

        return redirect()->route('admin.element.index')->with('success', 'Data successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Element::find($id)->delete();

        return redirect()->route('admin.element.index')->with('success', 'Data successfully deleted!');
    }
}
