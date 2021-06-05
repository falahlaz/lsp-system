<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Form02;
use App\Form01;
use App\Form01Scheme;
use App\User;
use App\Scheme;
use App\Form02Answer;
use App\ExamScore;
use App\ExamAnswer;
use App\ExamUserAnswer;
use App\ExamQuestion;
use App\UnitScheme;
use App\AssessorScheme;
use App\Assessor;
use App\Tuk;
use App\Requirement;

use App\Mail\Apl02Mail;
use App\Mail\ExamMail;
use App\Mail\RecapMail;

use Redirect;

class ParticipantController extends Controller
{
    public function indexApl01()
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
        $data['user']   = User::find(\Session::get('id_user'));
        $data['apl01']  = \DB::table('vw_form01')->select('id', 'name', 'nationality', 'phone', 'private_email', 'status', 'scheme', 'id_scheme')->where('status', '<>', 0)->orderBy('created_at', 'desc')->get();

        return view('admin.participant.apl01', compact('data'));
    }

    public function showApl01($id, $id_scheme)
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
        $data['user']           = User::find(\Session::get('id_user'));
        $data['apl01']          = Form01::find($id);
        $data['scheme']         = Scheme::select('name')->find($id_scheme);
        $data['schemeApl01']    = Form01Scheme::where("id_scheme", $id_scheme)->where("id_form01", $id)->first();
        $data['unit']           = UnitScheme::select('id','code','name', 'pub_year')->where('id_scheme', $id_scheme)->get();
        $data['asesor']         = AssessorScheme::where('id_scheme', $id_scheme)->get();
        $data['requirement']    = Requirement::where('id_form01', $id)->get();

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
        $token = md5(date("H:i:s d-M-Y") . " " . $id_form01);
        $id_scheme_form01 = $request->id_scheme_form01;
        $id_asesor     = $request->id_asesor;
        $ket_bukti_kelengkapan_1 = $request->ket_bukti_kelengkapan_1;
        $ket_bukti_kelengkapan_2 = $request->ket_bukti_kelengkapan_2;
        $ket_bukti_kelengkapan_3 = $request->ket_bukti_kelengkapan_3;
        $ket_bukti_kompetensi_1  = $request->ket_bukti_kompetensi_1;
        $ket_bukti_kompetensi_2  = $request->ket_bukti_kompetensi_2;
        $ket_bukti_kompetensi_3  = $request->ket_bukti_kompetensi_3;
        $ket_bukti_kompetensi_4  = $request->ket_bukti_kompetensi_4;
        $keterangan = $request->keterangan;

        foreach(\DB::table('t_requirement')->where('id_form01', $id_form01)->get() as $requirement) {
            if ($requirement->name === 'Bukti Lulusan SMK Jurusan Teknik Otomotif') {
                \DB::table("t_requirement")->where("id", $requirement->id)->update([
                    "apprv" => $ket_bukti_kelengkapan_1
                ]);
            }
            if ($requirement->name === 'Bukti Min Lulusan SMP/SLTP & memiliki Sertifikat Pelatihan Kerja Yang Relevan') {
                \DB::table("t_requirement")->where("id", $requirement->id)->update([
                    "apprv" => $ket_bukti_kelengkapan_2
                ]);
            }
            if ($requirement->name === 'Bukti Pengalaman Kerja yang relevan di Bengkel Otomotif') {
                \DB::table("t_requirement")->where("id", $requirement->id)->update([
                    "apprv" => $ket_bukti_kelengkapan_3
                ]);
            }
            if ($requirement->name === 'Bukti Kompetensi 1') {
                \DB::table("t_requirement")->where("id", $requirement->id)->update([
                    "apprv" => $ket_bukti_kompetensi_1
                ]);
            } 
            if ($requirement->name === 'Bukti Kompetensi 2') {
                \DB::table("t_requirement")->where("id", $requirement->id)->update([
                    "apprv" => $ket_bukti_kompetensi_2
                ]);
            } 
            if ($requirement->name === 'Bukti Kompetensi 3') {
                \DB::table("t_requirement")->where("id", $requirement->id)->update([
                    "apprv" => $ket_bukti_kompetensi_3
                ]);
            } 
            if ($requirement->name === 'Bukti Kompetensi 4') {
                \DB::table("t_requirement")->where("id", $requirement->id)->update([
                    "apprv" => $ket_bukti_kompetensi_4
                ]);
            } 
        }

        $registrasi = Form01Scheme::find($id_scheme_form01);
        $registrasi->update([
                'status' => 2
        ]);
        
        Form02::create([
            'id_form01' => $id_form01,
            'id_asesor' => $id_asesor,
            'id_scheme_form01' => $id_scheme_form01,
            'status' => 1,
            'token' => $token
        ]);

        $registrasi = \DB::table('t_form01')->where('id', $id_form01)->first();
        \Mail::to($registrasi->private_email)->send(new Apl02Mail($registrasi->name, route('register.apl02', $token)));

        return Redirect::to(route('admin.form.apl01'))->with('success','Data berhasil disimpan');

    }

    public function indexApl02()
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
        $data['user'] = User::find(\Session::get('id_user'));
        $asesor = Assessor::where('id_users', \Session::get('id_user'))->first();

        if ($asesor) {
            $data['apl02'] = \DB::table('vw_form02')->where('id_asesor', $asesor->id)->where('status', '<>', 0)->orderBy('created_at', 'desc')->get();
        } else {
            $data['apl02'] = \DB::table('vw_form02')->where('status', '<>', 0)->orderBy('created_at', 'desc')->get();
        }

        return view('admin.participant.apl02', compact('data'));
    }
    
    public function showApl02($id) {
        $data['user'] = User::find(\Session::get('id_user'));
        $data["apl02"]  =   Form02::find($id);
        $data["unit_scheme"] = UnitScheme::where('id_scheme', $data["apl02"]->schemeForm01Rel->id_scheme)->with('element')->get();
        $data['id_form02'] = $id;
        $data["answer"] = [];
        foreach (Form02Answer::where("id_form02", $id)->get() as $answer) {
            $data["answer"][$answer->id_unit_question] = $answer;
        }
        $data["user_asesor"] = Assessor::find($data["apl02"]->id_asesor);
        return view('admin.participant.detailForm02',\compact('data'));
    }

    public function storeApl02 (Request $request, $id) {
        foreach ($request->question as $question) {
            $answer =   Form02Answer::where("id_unit_question", $question['id_unit_question'])
                                    ->where("id_form02", $id)
                                    ->first();
            $answer->asesor_answer = $question['answer'];
            $answer->save();
        }
        $token = md5(date("H:i:s d-M-Y") . " " . $id);
        $form02 = Form02::find($id);
        $form02->status = 3;
        $form02->save();
        ExamScore::create([
            'id_form02' => $id,
            'id_scheme' => $form02->schemeForm01Rel->id_scheme,
            'timeleft' => 120,
            'status' => 1,
            'token' => $token
        ]);
        
        $registrasi = Form01Scheme::where('id_form01', $form02->id_form01)
                        ->where('id_scheme', $form02->schemeForm01Rel->id_scheme)
                        ->first();
        $registrasi->status = 3;
        $registrasi->save();
        
        $registrasi = \DB::table('t_form01')->where('id', $form02->id_form01)->first();
        \Mail::to($registrasi->private_email)->send(new ExamMail($registrasi->name, route('register.exam', $token)));
        
        return Redirect::to(route('admin.form.apl02'))->with('success','Data berhasil disimpan');
    }

    public function indexExamRecap()
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
        $data['user'] = User::find(\Session::get('id_user'));
        $data["exam"] = ExamScore::whereDate("end_exam", "<", date("Y-m-d H:i:s"))->orderBy('created_at', 'desc')->get();

        if ($data['user']->id_position == 2) {
            $data['exam'] = $data['exam']->filter(function($item) use ($data) {
                return $item->form02Rel->id_asesor == $data['user']->asesor->id;
            });
        }

        return view('admin.participant.examRecap', compact('data'));
    }

    public function showExamRecap($id)
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
        $data['tuk']  = Tuk::select('id', 'name')->where('status', 1)->orderBy('name')->get();
        $data["user"] = User::find(\Session::get('id_user'));
        $data["exam"] = ExamScore::find($id);
        $data["userAnswer"] = ExamUserAnswer::where("id_exam_score", $id)->get();
        $data["questionList"] = ExamQuestion::where("id_scheme", $data["exam"]->id_scheme)->get();
        foreach ($data["questionList"] as $question) {
            $question["answerList"] = ExamAnswer::where("id_exam_question", $question->id)->get();
            foreach ($question["answerList"] as $answer) {
                foreach ($data["userAnswer"] as $userAnswer) {
                    $answer->is_checked = 0;
                    if ($userAnswer->id_exam_answer == $answer->id) {
                        $answer->is_checked = 1;
                        break;
                    }
                }
            }
        }
        return view('admin.participant.detailExam', compact('data'));
    }

    public function storeExamRecap(Request $request, $id)
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
        $request->validate([
            'graduation' => 'required'
        ]);

        $graduation = $request->graduation;
        $exam = ExamScore::find($id);
        $form02 = Form02::find($exam->id_form02);
        $form01 = Form01::find($form02->id_form01);
        $scheme = Scheme::find($exam->id_scheme);
        $exam_date = date('d-m-Y', strtotime($exam->start_exam));

        $exam->status = 3;
        $exam->save();

        $registration = Form01Scheme::where("id_form01", $form01->id)
                                    ->where("id_scheme", $scheme->id)
                                    ->first();

        if ($graduation == "Lulus") {
            $tuk = Tuk::find($request->id_tuk);
            $date = date("d-m-Y", strtotime($request->tanggal_ujikom));
            $time = date("H:i", strtotime($request->tanggal_ujikom));
            $registration->status = 4;
            $registration->save();

            $mail = new RecapMail($form01, $exam_date, $scheme->name, $graduation, $tuk, $date, $time);
        } else {
            $registration->status = 5;
            $registration->save();
            $mail = new RecapMail($form01, $exam_date, $scheme->name, $graduation);
        }

        \Mail::to($form01->private_email)->send($mail);
        return \Redirect::to(route("admin.form.recap"))->with("success", "Email berhasil dikirm");
    }
}
