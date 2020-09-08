<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;

class AuthController extends Controller
{
    public function login()
    {
        if(\Session::has('id_user')) return redirect()->route('admin.dashboard');

        return view('login');
    }

    // method login store
    public function loginStore(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        // if user login with username
        if(Auth::attempt(['username' => $username, 'password' => $password])) {
            // get user
            $user    = User::where('username', $username)->first();

            \Session::put('id_user', $user->id);
            \Session::put('id_position', $user->id_position);

            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('login')->with('error', 'Username / Password Invalid!')->withInput();
    }

    // method generate token
    public function generateToken($id_user)
    {
        // get user
        $user = User::find($id_user);

        // return token if already exist
        if(!is_null($user->token)) return $user->token;

        // create new token if not exist
        $token = bcrypt($id_user);
        $user->update([
            'token' => $token
        ]);

        return $token;
    }

    // method logout
    public function logout()
    {
        \Session::flush();

        return redirect()->route('login');
    }

    public function register()
    {

        return view('user.form01');
    }

    public function ConfirmRegister()
    {
        return view('user.confirmRegister');
    }
}
