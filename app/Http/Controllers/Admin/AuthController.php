<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;

class AuthController extends Controller
{
    // method login
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        // if user login with username
        if(Auth::attempt(['username' => $username, 'password' => $password])) {
            // get user
            $user    = \DB::table('m_users')->where('username', $username);
            $id_user = $user->first()->id;

            // generate login token
            $token = $this->generateToken($id_user);

            // send response
            // return response()->json([
            //     'message' => 'Login success',
            //     'token' => $token,
            //     'id_user' => $id_user
            // ], 200);

            return view('user.login');
        }

        // if user login with email
        if(Auth::attempt(['email' => $username, 'password' => $password])) {
            // get user
            $user    = \DB::table('m_users')->where('email', $username);
            $id_user = $user->first()->id;

            // generate login token
            $token = $this->generateToken($id_user);

            // send response
            return response()->json([
                'message' => 'Login success',
                'token' => $token,
                'id_user' => $id_user
            ], 200);
        }

        // return response if all credentials false
        return response()->json([
            'message' => 'Login failed. Please check your credentials',
        ], 401);
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
    public function logout(Request $request)
    {
        // get login token
        $token = $request->bearerToken();

        // update token to null
        User::where('token', $token)->update([
            'token' => null
        ]);

        // return response
        return response()->json([
            'message' => 'Logout success'
        ], 200);
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
