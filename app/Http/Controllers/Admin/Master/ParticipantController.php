<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
