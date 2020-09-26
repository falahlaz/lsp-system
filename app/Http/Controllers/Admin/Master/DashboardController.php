<?php
namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
        $data['user']               = User::find(\Session::get('id_user'));
        $data['count_tuk']          = \DB::table('m_tuk')->where('status', 1)->count();
        $data['count_asesor']       = \DB::table('m_asesor')->where('status', 1)->count();
        $data['count_participant']  = \DB::table('t_form01')->where('status', 1)->count();
        $data['scheme']             = \DB::table('vw_scheme_form01')->get();

        return view('admin.dashboard.index', compact('data'));
    }

}
