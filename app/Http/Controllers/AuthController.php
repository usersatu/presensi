<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function prosesLogin(Request $request)
    {
        if (Auth::guard('karyawan')->attempt(['nik'=>$request->nik,'password'=>$request->password])) {
           return redirect('/dashboard');
        }
        else {
            return redirect('/')->with(['warning' => 'NIK dan Passwors Anda Salah']);
        }  
    }
    public function prosesLogout()
    {
        if (Auth::guard('karyawan')->check()){
            Auth::guard('karyawan')->Logout();
            return redirect('/');
        }
    }

    public function prosesLogoutadmin()
    {
        if (Auth::guard('user')->check()){
            Auth::guard('user')->Logout();
            return redirect('/panel');
        }
    }


    public function prosesLoginadmin(Request $request)
    {
        if (Auth::guard('user')->attempt(['email' => $request->email,'password' => $request->password])) {
           return redirect('/panel/dashboardadmin');
        }
        else {
            return redirect('/panel')->with(['warning' => 'Username atau Passwors Anda Salah']);
        }  
    }
}


