<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Form02;
use App\User;

class ParticipantController extends Controller
{
    public function indexApl01()
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
        $data['user'] = User::find(\Session::get('id_user'));
        $data['apl01'] = \DB::table('t_form01')->select('id', 'name', 'nationality', 'phone', 'private_email', 'status')->where('status', '<>', 0)->orderBy('created_at', 'desc')->get();

        return view('admin.participant.apl01', compact('data'));
    }

    public function showApl01($id)
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
        $data['user']           = User::find(\Session::get('id_user'));
        $data['apl01']          = \DB::table('t_form01')->where('id',$id)->first();
        $data['asesor']         = \DB::table('m_asesor')->get();
        $data['requirement']    = \DB::table('t_requirement')->where('id_form01', $id)->get();

        foreach($data['requirement'] as $requirement) {
            if($requirement->name === 'Bukti Lulusan SMK Jurusan Teknik Otomotif') $data['kelengkapan1'] = $requirement;
            if($requirement->name === 'Bukti Min Lulusan SMP/SLTP & memiliki Sertifikat Pelatihan Kerja Yang Relevan') $data['kelengkapan2'] = $requirement;
            if($requirement->name === 'Bukti Pengalaman Kerja yang relevan di Bengkel Otomotif') $data['kelengkapan3'] = $requirement;
            if($requirement->name === 'Bukti Kompetensi 1') $data['kompetensi1'] = $requirement;
            if($requirement->name === 'Bukti Kompetensi 2') $data['kompetensi2'] = $requirement;
            if($requirement->name === 'Bukti Kompetensi 3') $data['kompetensi3'] = $requirement;
            if($requirement->name === 'Bukti Kompetensi 4') $data['kompetensi4'] = $requirement;
        }

        return view('admin.participant.detailForm01',\compact('data'));
    }

    public function store(Request $request)
    {
        // mengambil data dari inputan
        $id_form01 = $request->id_form01;
        $id_asesor     = $request->id_asesor;
        $ket_bukti_kelengkapan_1 = $request->ket_bukti_kelengkapan_1;
        $ket_bukti_kelengkapan_2 = $request->ket_bukti_kelengkapan_2;
        $ket_bukti_kelengkapan_3 = $request->ket_bukti_kelengkapan_3;
        $ket_bukti_kompetensi_1  = $request->ket_bukti_kompetensi_1;
        $ket_bukti_kompetensi_2  = $request->ket_bukti_kompetensi_2;
        $ket_bukti_kompetensi_3  = $request->ket_bukti_kompetensi_3;
        $keterangan = $request->keterangan;

        Form02::create([
            'id_form01' => $id_form01,
            'id_asesor' => $id_asesor,
            // 'ket_bukti_kelengkapan_persyaratan_1' => $ket_bukti_kelengkapan_1,
            // 'ket_bukti_kelengkapan_persyaratan_2' => $ket_bukti_kelengkapan_2,
            // 'ket_bukti_kelengkapan_persyaratan_3' => $ket_bukti_kelengkapan_3,
            // 'ket_bukti_kompetensi_1' => $ket_bukti_kompetensi_1,
            // 'ket_bukti_kompetensi_2' => $ket_bukti_kompetensi_2,
            // 'ket_bukti_kompetensi_3' => $ket_bukti_kompetensi_3,
            'status' => 1,
            // 'keterangan' => $keterangan
        ]);

        $registrasi = \DB::table('t_form01')->where('id',$id_form01);
        $registrasi->update([
                'status' => 2
        ]);
        return view('admin.participant.apl02')->with('success',true);

    }

    public function indexApl02()
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
        $data['user'] = User::find(\Session::get('id_user'));
        $data['apl02'] = \DB::table('vw_form02')->where('status', '<>', 0)->orderBy('created_at', 'desc')->get();

        return view('admin.participant.apl02', compact('data'));
    }

    public function indexRecap()
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
        $data['user'] = User::find(\Session::get('id_user'));

        return view('admin.participant.examRecap', compact('data'));
    }
}
