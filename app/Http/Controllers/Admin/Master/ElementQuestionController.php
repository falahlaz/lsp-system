<?php

namespace App\Http\Controllers\Admin\Master;
use App\Http\Controllers\Controller;

use App\User;
use App\ElementQuestion;
use Illuminate\Http\Request;

class ElementQuestionController extends Controller
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
            'name' => 'required',
            'id_element' => 'required',
        ]);

        // mengambil data inputan dan tambah data ke database
        foreach($request->name as $name) {
            ElementQuestion::create([
                'question' => $name,
                'id_element' => $request->id_element,
                'status' => 1,
            ]);
        }

        return redirect()->route('admin.element.edit', ['element' => $request->id_element])->with('success', 'Data successfully added!');
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
        $data['user'] = User::find(\Session::get('id_user'));
        $data['question']   = \DB::table('m_element_question')->select('id', 'question', 'status')->orderBy('question', 'asc')->get();
        $data['edit']       = ElementQuestion::find($id);

        return view('admin.question.edit', compact('data'));
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
            'id_element' => 'required'
        ]);

        // mengambil data inputan dan tambah data ke database
        ElementQuestion::find($id)->update([
            'question' => $request->question,
        ]);

        return redirect()->route('admin.element.edit', ['element' => $request->id_element])->with('success', 'Data successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = ElementQuestion::find($id);
        $question->delete();

        return redirect()->route('admin.element.edit', ['element' => $question->id_element])->with('success', 'Data successfully deleted!');
    }
}