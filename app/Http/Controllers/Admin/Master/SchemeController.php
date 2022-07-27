<?php

namespace App\Http\Controllers\Admin\Master;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

use App\Scheme;
use App\UnitScheme;
use App\User;
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
        $data['user'] = User::find(\Session::get('id_user'));
        $data['scheme'] = \DB::table('m_scheme')->where('status', 1)->select('id', 'code', 'name')->get();

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
            'mea_status' => 'required',
            'image' => 'mimes:jpeg,jpg,png,JPEG,JPG,PNG',
        ]);

        $filename = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'images/scheme/'.time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/scheme/'), $filename);
        }

        // mengambil data inputan dan tambah data ke database
        Scheme::create([
            'code' => $request->code,
            'name' => $request->name,
            'category' => $request->category,
            'field' => $request->field,
            'mea_status' => $request->mea_status,
            'image' => $filename,
            'status' => 1
        ]);

        //response
        return \redirect()->route('admin.scheme.index')->with('success', 'Data successfully added!');
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
        $data['user'] = User::find(\Session::get('id_user'));
        $data['scheme'] = \DB::table('m_scheme')->where('id',$scheme->id)->first();
        $data['unit']   = \DB::table('m_unit')->select('id', 'code', 'name')
                            ->where('id_scheme', $scheme->id)
                            ->where('status', 1)
                            ->orderBy('name', 'asc')
                            ->get();

        return view('admin.scheme.edit', compact('data'));
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
            'image' => 'mimes:jpeg,jpg,png,JPEG,JPG,PNG',
        ]);

        // get data from database
        $scheme = Scheme::find($id);

        // upload image if exist
        $filename = $scheme->image;
        if ($request->hasFile('image')) {
            $oldfile = $scheme->image;
            $image = $request->file('image');
            $filename = 'images/scheme/'.time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/scheme/'), $filename);

            if (File::exists($oldfile)) {
                File::delete($oldfile);
            }
        }

        // mengambil data inputan dan tambah data ke database
        $scheme->update([
            'code' => $request->code,
            'name' => $request->name,
            'category' => $request->category,
            'field' => $request->field,
            'mea_status' => $request->mea_status,
            'image' => $filename,
        ]);

        //response
        return redirect()->back()->with('success', 'Data successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Scheme::find($id)->delete();
        UnitScheme::where('id_scheme', $id)->delete();

        //response
        return \redirect()->route('admin.scheme.index')->with('success', 'Data successfully deleted!');

    }
}
