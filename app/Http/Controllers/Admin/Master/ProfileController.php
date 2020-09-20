<?php

namespace App\Http\Controllers\Admin\Master;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    public function index(){
        $name  = \DB::table('m_asesor')->select('name')->get();
        return view('admin.app');
    }

    public function show($id)
    {
        $data = Assessor::find($id);

        return view('admin.profile.index',\compact('data'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=> 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        User::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        Assessor::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return redirect()->route('admin.profile');
    }
}
