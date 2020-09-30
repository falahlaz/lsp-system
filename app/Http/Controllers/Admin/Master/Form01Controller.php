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

// <<<<<<< HEAD

//         $fileExt = ['png','jpg','jpeg'];

//         // mengambil data foto ktp
//         $photo_ktp = $request->file('photo_ktp');
//         $extFileFotoKTP = $photo_ktp->getClientOriginalExtension();
//         if(in_array($extFileFotoKTP,$fileExt)){
//             $namePhotoKTP = time() ."." . $extFileFotoKTP;
//             $photo_ktp->move('/upload/photo_ktp',$namePhotoKTP);
//         }else{
//             return redirect()->route('register')->with('error', 'true')->withInput($request->all());
//         }

//         //mengambil data pass foto
//         $pass_photo = $request->file('pass_photo');
//         $extFilePassFoto = $pass_photo->getClientOriginalExtension();
//         if(in_array($extFilePassFoto,$fileExt)){
//             $namePassPhoto = time() . ".". $extFilePassFoto;
//             $pass_photo->move('/upload/pass_photo',$namePassPhoto);
//         } else {
//             return \redirect()->route('register')->with('error', 'true')->withInput($request->all());
//         }

//         // mengambil data kelengkapan 1
//         $kelengkapan_1 = $request->file('buktiKelengkapan1');
//         $extFileKelengkapan_1 = $kelengkapan_1->getClientOriginalExtension();
//         if(\in_array($extFileKelengkapan_1,$fileExt)){
//             $bukti_kelengkapan_1 = time() . "." . $extFileKelengkapan_1;
//             $kelengkapan_1->move('/upload/kelengkapan/kelengkapan1',$bukti_kelengkapan_1);
//         } else {
//             return redirect()->route('register')->with('error', 'true')->withInput($request->all());
//         }

//         // mengambil data kelengkapan 2
//         $kelengkapan_2 = $request->file('buktiKelengkapan2');
//         $extFileKelengkapan_2 = $kelengkapan_2->getClientOriginalExtension();
//         if(\in_array($extFileKelengkapan_2,$fileExt)){
//             $bukti_kelengkapan_2 = time() . "." . $extFileKelengkapan_2;
//             $kelengkapan_2->move('/upload/kelengkapan/kelengkapan2',$bukti_kelengkapan_2);
//         } else {
//             return redirect()->route('register')->with('error', 'true')->withInput($request->all());
//         }

//         // mengambil data kelengkapan 3
//         $kelengkapan_3 = $request->file('buktiKelengkapan3');
//         $extFileKelengkapan_3 = $kelengkapan_3->getClientOriginalExtension();
//         if(\in_array($extFileKelengkapan_3,$fileExt)){
//             $bukti_kelengkapan_3 = time() . "." . $extFileKelengkapan_3;
//             $kelengkapan_3->move('/upload/kelengkapan/kelengkapan3',$bukti_kelengkapan_3);
//         } else {
//             return redirect()->route('register')->with('error', 'true')->withInput($request->all());
//         }

//         // mengambil data kompetensi 1
//         $kompetensi_1 = $request->file('buktiKompetensi1');
//         $extFileKompetensi_1= $kompetensi_1->getClientOriginalExtension();
//         if(\in_array($extFileKompetensi_1,$fileExt)){
//             $bukti_kompetensi_1 = time() . "." . $extFileKompetensi_1;
//             $kompetensi_1->move('/upload/kompetensi/kompetensi1',$bukti_kompetensi_1);
//         } else {
//             return redirect()->route('register')->with('error', 'true')->withInput($request->all());
//         }

//         // mengambil data kompetensi 2
//         $kompetensi_2 = $request->file('buktiKompetensi2');
//         $extFileKompetensi_2= $kompetensi_2->getClientOriginalExtension();
//         if(\in_array($extFileKompetensi_2,$fileExt)){
//             $bukti_kompetensi_2 = time() . "." . $extFileKompetensi_2;
//             $kompetensi_2->move('/upload/kompetensi/kompetensi2',$bukti_kompetensi_2);
//         } else {
//             return redirect()->route('register')->with('error', 'true')->withInput($request->all());
//         }

//         // mengambil data kompetensi 3
//         $kompetensi_3 = $request->file('buktiKompetensi3');
//         $extFileKompetensi_3= $kompetensi_3->getClientOriginalExtension();
//         if(\in_array($extFileKompetensi_3,$fileExt)){
//             $bukti_kompetensi_3 = time() . "." . $extFileKompetensi_3;
//             $kompetensi_3->move('/upload/kompetensi/kompetensi3',$bukti_kompetensi_3);
//         } else {
//             return redirect()->route('register')->with('error', 'true')->withInput($request->all());
//         }

// =======
//         $ktp_file_name = time().'.'.$request->photo_ktp->extension();
//         $request->photo_ktp->move(public_path('images/ktp'), $ktp_file_name);

//         $pass_file_name = time().'.'.$request->pass_photo->extension();
//         $request->pass_photo->move(public_path('images/pass_foto'), $pass_file_name);
// >>>>>>> 980a2d7b30699fbf472312f85a5b70127a66177f

//         $participant = Form01::create([
//             'name' => $request->name,
//             'nik' => $request->nik,
// <<<<<<< HEAD
//             'photo_ktp' => $namePhotoKTP,
//             'pass_photo' => $namePassPhoto,
// =======
//             'photo_ktp' => $ktp_file_name,
//             'pass_photo' => $pass_file_name,
// >>>>>>> 980a2d7b30699fbf472312f85a5b70127a66177f
//             'birth_place' => $request->birth_place,
//             'birth_date' => $request->birth_date,
//             'gender' => $request->gender,
//             'nationality' => $request->nationality,
//             'home_address' => $request->home_address,
//             'house_phone' => $request->house_phone,
//             'phone' => $request->phone,
//             'office_phone' => $request->office_phone,
//             'private_email' => $request->private_email,
//             'post_code' => $request->post_code,
//             'last_educ' => $request->last_educ,
//             'company_name' => $request->company_name,
//             'position' => $request->position,
//             'company_address' => $request->company_address,
//             'company_phone' => $request->company_phone,
//             'company_fax' => $request->company_fax,
//             'company_email' => $request->company_email,
//             'company_post_code' => $request->company_post_code,
//             'skema_sertifikasi' => $request->skema_sertifikasi,
//             'tujuan_asesmen' => $request->tujuan_asesmen,
//             'bukti_kelengkapan_1' => $bukti_kelengkapan_1,
//             'bukti_kelengkapan_2' => $bukti_kelengkapan_2,
//             'bukti_kelengkapan_3' => $bukti_kelengkapan_3,
//             'bukti_kompetensi_1' => $bukti_kompetensi_1,
//             'bukti_kompetensi_2' => $bukti_kompetensi_2,
//             'bukti_kompetensi_3' => $bukti_kompetensi_3,
//             'status' => 1
//         ]);

// <<<<<<< HEAD
//                 foreach($request->schemes as $scheme){
//                     if($schemes != null){
//                         Form01Scheme::create([
//                             'id_form01' => $participant->id,
//                             'id_scheme' => $scheme,
//                             'status' => 1
//                         ]);
//                     }
//                 }
//         return \redirect()->route('participant.form01')->with('success', true)->withInput($request->all());
// =======
//         foreach($request->id_schemes as $scheme){
//             if($scheme != null){
//                 Form01Scheme::create([
//                     'id_form01' => $participant->id,
//                     'id_scheme' => $scheme,
//                     'status' => 1
//                 ]);
//             }
//         }

//         if($request->has('buktiKelengkapan1')) $this->upload($request->buktiKelengkapan1, 'kelengkapan1', $participant->id, 'Bukti Lulusan SMK Jurusan Teknik Otomotif');
//         if($request->has('buktiKelengkapan2')) $this->upload($request->buktiKelengkapan2, 'kelengkapan2', $participant->id, 'Bukti Min Lulusan SMP/SLTP & memiliki Sertifikat Pelatihan Kerja Yang Relevan');
//         if($request->has('buktiKelengkapan3')) $this->upload($request->buktiKelengkapan3, 'kelengkapan3', $participant->id, 'Bukti Pengalaman Kerja yang relevan di Bengkel Otomotif');
//         if($request->has('buktiKompetensi1')) $this->upload($request->buktiKompetensi1, 'kompetensi1', $participant->id, 'Bukti Kompetensi 1');
//         if($request->has('buktiKompetensi2')) $this->upload($request->buktiKompetensi2, 'kompetensi2', $participant->id, 'Bukti Kompetensi 2');
//         if($request->has('buktiKompetensi3')) $this->upload($request->buktiKompetensi3, 'kompetensi3', $participant->id, 'Bukti Kompetensi 3');
//         if($request->has('buktiKompetensi4')) $this->upload($request->buktiKompetensi4, 'kompetensi4', $participant->id, 'Bukti Kompetensi 4');

//         return redirect()->route('register')->with('success', 'Form APL 01 berhasil dikirim, tunggu konfirmasi admin melalu WA atau SMS!')->withInput($request->all());
//     }

//     public function upload($image, $path, $form_id, $file_name)
//     {
//         $image_name = time().'.'.$image->extension();
//         $image->move(public_path('images/'.$path), $image_name);

//         Requirement::create([
//             'id_form01' => $form_id,
//             'file_name' => $image_name,
//             'name' => $file_name,
//             'status' => 1,
//         ]);
// >>>>>>> 980a2d7b30699fbf472312f85a5b70127a66177f
//     }
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
