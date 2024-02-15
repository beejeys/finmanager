<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{

    public function login() {
        return view('pages.login');
    }

    public function do_login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        $credentials['type'] = 'user';

        if(Auth::guard('user')->attempt($credentials)) {
            return redirect('/app');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    public function logout() {
        Auth::guard('user')->logout();
        return redirect('/');
    }


    public function profile() {
        $user = Auth::guard('user')->user();
        return view('pages.profile-form',compact('user'));
    }

    public function update_profile(Request $user) {


    }
}
