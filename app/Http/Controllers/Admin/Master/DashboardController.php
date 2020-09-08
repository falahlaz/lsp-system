<?php

namespace App\Http\Controllers\Admin\Master;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
        return view('admin.dashboard.index');
    }

}
