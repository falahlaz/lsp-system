<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
use App\Assessor;
use App\AssessorScheme;

class AssessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \DB::table('m_asesor')->select('id','name','reg_num','phone')->get();
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
            'name' => 'required',
            'reg_num' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'id_tuk' => 'required',
            'id_scheme' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
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
            'status' => $request->status,
            'id_tuk' => $request->id_tuk
        ]);
        
        $all_scheme = $request->id_scheme;

        foreach($all_scheme as $scheme){
            AssessorScheme::create([
                'id_asesor' => $asesor->id,
                'id_scheme' => $scheme,
                'status' => 1
            ]);
        }
        
        //response
        $response = [
            'message' => 'Insert Assessor success'
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
        $data = \DB::table('vw_assessor')->where('id',$id)->get();
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
            'name' => 'required',
            'reg_num' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'status' => 'required',
            'id_tuk' => 'required'
        ]);

        // mengambil data inputan dan tambah data ke database
        Assessor::where('id',$id)->update([
            'name' => $request->name,
            'reg_num' => $request->reg_num,
            'gender' => $request->gender,
            'address' => $request->address,
            'phone' => $request->phone,
            'status' => $request->status,
            'id_tuk' => $request->id_tuk
        ]);
        
        //response
        $response = [
            'message' => 'Update Assessor success'
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
        Assessor::destroy($id);

        //response
        $response = [
            'message' => 'Delete Assessor success'
        ];

        return response()->json($response,200);
    }
}
