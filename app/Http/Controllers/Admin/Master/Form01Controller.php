<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Form01;
use App\Form01Scheme;
use App\Scheme;

class Form01Controller extends Controller
{
    public function index()
    {
        $data = \DB::table('t_form01')->select('id', 'name', 'gender', 'nationality', 'private_email', 'phone', 'status')->get();
        $data['skema'] = \DB::table('m_scheme')->select('id','name')->get();
        return view('participant.form01',\compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'nik' => ['required'],
            'photo_ktp' => ['required'],
            'pass_photo' => ['required'],
            'birth_place' => ['required'],
            'birth_date' => ['required'],
            'gender' => ['required'],
            'nationality' => ['required'],
            'home_address' => ['required'],
            'house_phone' => ['required'],
            'phone' => ['required'],
            'office_phone' => ['required'],
            'private_email' => ['required'],
            'post_code' => ['required'],
            'last_educ' => ['required'],
            'company_name' => ['required'],
            'position' => ['required'],
            'company_address' => ['required'],
            'company_phone' => ['required'],
            'company_fax' => ['required'],
            'company_email' => ['required'],
            'company_post_code' => ['required']
            // 'schemes' => ['required']
            ]);

        $participant = Form01::create([
            'name' => $request->name,
            'nik' => $request->nik,
            'photo_ktp' => $request->photo_ktp,
            'pass_photo' => $request->pass_photo,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
            'home_address' => $request->home_address,
            'house_phone' => $request->house_phone,
            'phone' => $request->phone,
            'office_phone' => $request->office_phone,
            'private_email' => $request->private_email,
            'post_code' => $request->post_code,
            'last_educ' => $request->last_educ,
            'company_name' => $request->company_name,
            'position' => $request->position,
            'company_address' => $request->company_address,
            'company_phone' => $request->company_phone,
            'company_fax' => $request->company_fax,
            'company_email' => $request->company_email,
            'company_post_code' => $request->company_post_code,
            'status' => 1,
        ]);

        // foreach($request->schemes as $scheme) {
        //     Form01Scheme::create([
        //         'id_form01' => $participant->id,
        //         'id_scheme' => $scheme,
        //         'status' => 1
        //     ]);
        // }
        return \redirect()->route('admin.profile');
    }

    public function showScheme($id)
    {
        // $data = \DB::table('m_scheme')->where('id',$id)->get();
        // $data = Scheme::where('id',$id)->get();

        $data = \DB::table('m_scheme')->select('id','code','name')->where('id',$id)->get();
        dd($data);
        return view('participant.form01',\compact('data'));
    }
}
