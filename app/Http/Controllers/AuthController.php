<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function prosesData(request $request){
        $request->validate([
                    'email' => 'required|email',
                    'password' => 'required|min:6',
                ], [
                    'email.required' => 'Email Tidak Boleh Kosong',
                    'email.email' => 'Format Email Tidak Valid',
                    'password.required' => 'Password Tidak Boleh Kosong',
                    'password.min' => 'Password Minimal 6 Karakter',
                ]);

        //OPSI 2 PADA VALIDASI EMAIL DAN PASSWORD
        // if($request->email == null || $request->password == null){
        //     return redirect()->back()->with('error', 'Email dan Password tidak boleh kosong');
        // }

        $checkLogin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($checkLogin)){
            $role = Auth::user()->role;
            if($role == 'admin'){
                return redirect()->route('admin');
            }else if($role == 'owner'){
                return redirect()->route('owner');
            }
            else if($role == 'kasir'){
                return redirect()->route('kasir');
            }else{
                return redirect()->back()->with('error', 'Role tidak ditemukan');
            }
        }else{
            return redirect()->back()->with('error', 'Email atau Password salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda telah berhasil logout');
    }
}
