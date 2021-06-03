<?php

namespace App\Http\Controllers\Admin\Master;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
use App\Assessor;
use App\AssessorScheme;
use App\Scheme;
use App\Tuk;

class AssessorController extends Controller
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
        $data['asesor'] = \DB::table('m_asesor')->select('id','name','reg_num','phone')->where('status', 1)->get();
        $data['tuk']    = \DB::table('m_tuk')->select('id','name')->where('status', 1)->get();
        $data['scheme'] = \DB::table('m_scheme')->select('id','name')->where('status', 1)->get();

        return view('admin.assessor.index',compact('data'));
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
            'name' => 'required',
            'reg_num' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'id_tuk' => 'required',
            'username' => 'required|unique:m_users,username',
            'email' => 'required|unique:m_users,email',
            'password' => 'required|confirmed',
        ]);

        // menambah data ke tabel user
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password'=> bcrypt($request->password),
            'id_position' => 2,
            'status' => 1
        ]);

        // mengambil data inputan dan tambah data ke database
        $asesor = Assessor::create([
            'name' => $request->name,
            'id_users' => $user->id,
            'reg_num' => $request->reg_num,
            'gender' => $request->gender,
            'address' => $request->address,
            'phone' => $request->phone,
            'status' => 1,
            'id_tuk' => $request->id_tuk
        ]);

        // add assessor scheme to database
        if ($request->id_scheme) {
            foreach($request->id_scheme as $scheme){
                AssessorScheme::create([
                    'id_asesor' => $asesor->id,
                    'id_scheme' => $scheme,
                    'status' => 1
                ]);
            }
        }

        return redirect()->route('admin.assessor.index')->with('success', 'Data successfully added!');
    }

    public function addScheme(Request $request)
    {
        $request->validate([
            'id_scheme' => 'required',
            'id_asesor' => 'required',
        ]);

        AssessorScheme::create([
            'id_asesor' => $request->id_asesor,
            'id_scheme' => $request->id_scheme,
            'status' => 1
        ]);

        return redirect()->back()->with("success", "Skema berhasil ditambahkan!");
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
        $data = \DB::table('vw_assessor')->select('id_assessor', 'assessor_name', 'reg_num', 'gender', 'address', 'phone', 'id_tuk', 'tuk_name')->where('id_assessor',$id)->first();

        return response()->json($data,200);
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
        $data['asesor'] = Assessor::find($id);
        $data['tuk']    = Tuk::select('id', 'name')->get();
        $data['scheme'] = Scheme::select('id', 'name')->orderBy('name')->where('status', 1)->get();
        $data['asesor_scheme'] = AssessorScheme::where('id_asesor', $id)->get();

        foreach ($data['asesor_scheme'] as $asesor_scheme) {
            $data['scheme'] = $data['scheme']->filter(function ($item) use ($asesor_scheme) {
                return data_get($item, 'id') != $asesor_scheme->id_scheme;
            });
        }

        return view('admin.assessor.detail',\compact('data'));
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
            'name' => 'required',
            'reg_num' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'id_tuk' => 'required'
        ]);

        // mengambil data inputan dan tambah data ke database
        Assessor::where('id',$id)->update([
            'name' => $request->name,
            'reg_num' => $request->reg_num,
            'gender' => $request->gender,
            'address' => $request->address,
            'phone' => $request->phone,
            'id_tuk' => $request->id_tuk
        ]);


        return \redirect()->back()->with('success', 'Data successfully updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asesor = Assessor::find($id);
        $asesor->delete();

        User::find($asesor->id_users)->delete();
        AssessorScheme::where('id_asesor', $id)->delete();

        return redirect()->route('admin.assessor.index')->with('success', 'Data successfully deleted!');
    }

    public function destroyScheme($id)
    {
        AssessorScheme::find($id)->delete();
        return redirect()->back()->with("success", "Skema berhasil dihapus!");
    }
}
