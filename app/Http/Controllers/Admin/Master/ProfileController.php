<?php

namespace App\Http\Controllers\Admin\Master;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $name  = \DB::table('m_asesor')->select('name')->get();
        return view('admin.app');
    }

    public function show($username)
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
        $data['user'] = User::find(\Session::get('id_user'));

        return view('admin.profile.index', compact('data'));
    }

    public function update(Request $request)
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
        $request->validate([
            'username' => 'required',
            'email' => 'required'
        ]);

        $user  = User::find(\Session::get('id_user'));
        $users = User::get();
        $imagePath = $user->image;
        foreach ($users as $all_user) {
            if ($request->username != $user->username) {
                if ($request->username === $all_user->username) {
                    return redirect()->back()->withErrors(['username' => 'The username has already been taken.']);
                }
            }
            if ($request->email != $user->email) {
                if ($request->email === $all_user->email) {
                    return redirect()->back()->withErrors(['email' => 'The email has already been taken.']);
                }
            }
        }

        if ($request->hasFile('image')) {
            $oldImage = public_path($imagePath);
            $image = $request->file('image');
            $path  = 'assets/img/avatar/profile/';
            $imageName = date('His').'_'.$image->getClientOriginalName();
            $imagePath = $path.$imageName;
            $image->move(public_path($path), $imageName);

            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }
        }

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'image' => $imagePath
        ]);

        return redirect()->back()->with("success", "Profile successfully updated!");
    }

    public function updatePassword(Request $request)
    {
        if(!\Session::has('id_user')) return redirect()->route('login');
        $request->validate([
            'current_password' => 'required',
            'password_confirmation' => 'required',
            'password' => 'required|confirmed'
        ]);
        
        $user = User::find(\Session::get('id_user'));
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The password is incorrect']);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with("success", "Password has been change!");
    }
}
