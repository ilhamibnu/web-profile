<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);

        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('/user')->with('loginberhasil', 'login berhasil');
            } else {
                return redirect()->intended('/login')->with('loginerror', 'login error');
            }
        } else

            return redirect()->intended('/login')->with('failed', 'login error');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended('/login')->with('logout', 'berhasil logout');
    }
}
