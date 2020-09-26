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
            'company_post_code' => ['required'],
            'skema_sertifikasi' => ['required'],
            'tujuan_asesmen' => ['required'],
            'schemes' => ['required']
        ]);


        $fileExt = ['png','jpg','jpeg'];

        // mengambil data foto ktp
        $photo_ktp = $request->file('photo_ktp');
        $extFileFotoKTP = $photo_ktp->getClientOriginalExtension();
        if(in_array($extFileFotoKTP,$fileExt)){
            $namePhotoKTP = time() ."." . $extFileFotoKTP;
            $photo_ktp->move('/upload/photo_ktp',$namePhotoKTP);
        }else{
            return redirect()->route('register')->with('error', 'true')->withInput($request->all());
        }

        //mengambil data pass foto
        $pass_photo = $request->file('pass_photo');
        $extFilePassFoto = $pass_photo->getClientOriginalExtension();
        if(in_array($extFilePassFoto,$fileExt)){
            $namePassPhoto = time() . ".". $extFilePassFoto;
            $pass_photo->move('/upload/pass_photo',$namePassPhoto);
        } else {
            return \redirect()->route('register')->with('error', 'true')->withInput($request->all());
        }

        // mengambil data kelengkapan 1
        $kelengkapan_1 = $request->file('buktiKelengkapan1');
        $extFileKelengkapan_1 = $kelengkapan_1->getClientOriginalExtension();
        if(\in_array($extFileKelengkapan_1,$fileExt)){
            $bukti_kelengkapan_1 = time() . "." . $extFileKelengkapan_1;
            $kelengkapan_1->move('/upload/kelengkapan/kelengkapan1',$bukti_kelengkapan_1);
        } else {
            return redirect()->route('register')->with('error', 'true')->withInput($request->all());
        }

        // mengambil data kelengkapan 2
        $kelengkapan_2 = $request->file('buktiKelengkapan2');
        $extFileKelengkapan_2 = $kelengkapan_2->getClientOriginalExtension();
        if(\in_array($extFileKelengkapan_2,$fileExt)){
            $bukti_kelengkapan_2 = time() . "." . $extFileKelengkapan_2;
            $kelengkapan_2->move('/upload/kelengkapan/kelengkapan2',$bukti_kelengkapan_2);
        } else {
            return redirect()->route('register')->with('error', 'true')->withInput($request->all());
        }

        // mengambil data kelengkapan 3
        $kelengkapan_3 = $request->file('buktiKelengkapan3');
        $extFileKelengkapan_3 = $kelengkapan_3->getClientOriginalExtension();
        if(\in_array($extFileKelengkapan_3,$fileExt)){
            $bukti_kelengkapan_3 = time() . "." . $extFileKelengkapan_3;
            $kelengkapan_3->move('/upload/kelengkapan/kelengkapan3',$bukti_kelengkapan_3);
        } else {
            return redirect()->route('register')->with('error', 'true')->withInput($request->all());
        }

        // mengambil data kompetensi 1
        $kompetensi_1 = $request->file('buktiKompetensi1');
        $extFileKompetensi_1= $kompetensi_1->getClientOriginalExtension();
        if(\in_array($extFileKompetensi_1,$fileExt)){
            $bukti_kompetensi_1 = time() . "." . $extFileKompetensi_1;
            $kompetensi_1->move('/upload/kompetensi/kompetensi1',$bukti_kompetensi_1);
        } else {
            return redirect()->route('register')->with('error', 'true')->withInput($request->all());
        }

        // mengambil data kompetensi 2
        $kompetensi_2 = $request->file('buktiKompetensi2');
        $extFileKompetensi_2= $kompetensi_2->getClientOriginalExtension();
        if(\in_array($extFileKompetensi_2,$fileExt)){
            $bukti_kompetensi_2 = time() . "." . $extFileKompetensi_2;
            $kompetensi_2->move('/upload/kompetensi/kompetensi2',$bukti_kompetensi_2);
        } else {
            return redirect()->route('register')->with('error', 'true')->withInput($request->all());
        }

        // mengambil data kompetensi 3
        $kompetensi_3 = $request->file('buktiKompetensi3');
        $extFileKompetensi_3= $kompetensi_3->getClientOriginalExtension();
        if(\in_array($extFileKompetensi_3,$fileExt)){
            $bukti_kompetensi_3 = time() . "." . $extFileKompetensi_3;
            $kompetensi_3->move('/upload/kompetensi/kompetensi3',$bukti_kompetensi_3);
        } else {
            return redirect()->route('register')->with('error', 'true')->withInput($request->all());
        }


        $participant = Form01::create([
            'name' => $request->name,
            'nik' => $request->nik,
            'photo_ktp' => $namePhotoKTP,
            'pass_photo' => $namePassPhoto,
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
            'skema_sertifikasi' => $request->skema_sertifikasi,
            'tujuan_asesmen' => $request->tujuan_asesmen,
            'bukti_kelengkapan_1' => $bukti_kelengkapan_1,
            'bukti_kelengkapan_2' => $bukti_kelengkapan_2,
            'bukti_kelengkapan_3' => $bukti_kelengkapan_3,
            'bukti_kompetensi_1' => $bukti_kompetensi_1,
            'bukti_kompetensi_2' => $bukti_kompetensi_2,
            'bukti_kompetensi_3' => $bukti_kompetensi_3,
            'status' => 1
        ]);

                foreach($request->schemes as $scheme){
                    if($schemes != null){
                        Form01Scheme::create([
                            'id_form01' => $participant->id,
                            'id_scheme' => $scheme,
                            'status' => 1
                        ]);
                    }
                }
        return \redirect()->route('participant.form01')->with('success', true)->withInput($request->all());
    }

    public function getUnit($id)
    {
        $data['unit'] = \DB::table('m_unit')->select('id','code','name', 'pub_year')->where('id_scheme', $id)->get();

        return view('participant.unit', compact('data'));
    }
}
