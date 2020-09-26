<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Form01;
use App\Form01Scheme;
use App\Scheme;
use App\Requirement;

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
            'company_post_code' => ['required'],
            'skema_sertifikasi' => ['required'],
            'tujuan_asesmen' => ['required'],
            'id_schemes' => ['required'],
        ]);

        $ktp_file_name = time().'.'.$request->photo_ktp->extension();
        $request->photo_ktp->move(public_path('images/ktp'), $ktp_file_name);

        $pass_file_name = time().'.'.$request->pass_photo->extension();
        $request->pass_photo->move(public_path('images/pass_foto'), $pass_file_name);

        $participant = Form01::create([
            'name' => $request->name,
            'nik' => $request->nik,
            'photo_ktp' => $ktp_file_name,
            'pass_photo' => $pass_file_name,
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
            'status' => 1
        ]);

        foreach($request->id_schemes as $scheme){
            if($scheme != null){
                Form01Scheme::create([
                    'id_form01' => $participant->id,
                    'id_scheme' => $scheme,
                    'status' => 1
                ]);
            }
        }

        if($request->has('buktiKelengkapan1')) $this->upload($request->buktiKelengkapan1, 'kelengkapan1', $participant->id, 'Bukti Lulusan SMK Jurusan Teknik Otomotif');
        if($request->has('buktiKelengkapan2')) $this->upload($request->buktiKelengkapan2, 'kelengkapan2', $participant->id, 'Bukti Min Lulusan SMP/SLTP & memiliki Sertifikat Pelatihan Kerja Yang Relevan');
        if($request->has('buktiKelengkapan3')) $this->upload($request->buktiKelengkapan3, 'kelengkapan3', $participant->id, 'Bukti Pengalaman Kerja yang relevan di Bengkel Otomotif');
        if($request->has('buktiKompetensi1')) $this->upload($request->buktiKompetensi1, 'kompetensi1', $participant->id, 'Bukti Kompetensi 1');
        if($request->has('buktiKompetensi2')) $this->upload($request->buktiKompetensi2, 'kompetensi2', $participant->id, 'Bukti Kompetensi 2');
        if($request->has('buktiKompetensi3')) $this->upload($request->buktiKompetensi3, 'kompetensi3', $participant->id, 'Bukti Kompetensi 3');
        if($request->has('buktiKompetensi4')) $this->upload($request->buktiKompetensi4, 'kompetensi4', $participant->id, 'Bukti Kompetensi 4');

        return redirect()->route('register')->with('success', 'Form APL 01 berhasil dikirim, tunggu konfirmasi admin melalu WA atau SMS!')->withInput($request->all());
    }

    public function upload($image, $path, $form_id, $file_name)
    {
        $image_name = time().'.'.$image->extension();
        $image->move(public_path('images/'.$path), $image_name);

        Requirement::create([
            'id_form01' => $form_id,
            'file_name' => $image_name,
            'name' => $file_name,
            'status' => 1,
        ]);
    }

    public function getUnit($id)
    {
        $param = explode(',', $id);
        $data['unit'] = [];

        foreach($param as $param) {
            $unit = \DB::table('m_unit')->select('id','code','name', 'pub_year')->where('id_scheme', $param)->get();
            foreach($unit as $unit) {
                array_push($data['unit'], $unit);
            }
        }

        return view('participant.unit', compact('data'));
    }
}
