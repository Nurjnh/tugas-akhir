<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use App\Models\Kabid;
class AuthController extends Controller
{
    function login(){
        return view('login')->with('success','Masuk dahulu');
    }

    function loginProses(Request $request){
        $credentials = $request->only('email', 'password');
        
        if(Auth::guard('admin')->attempt($credentials)) {
            if(Auth::guard('admin')->user()->level == 1){
                return redirect('admin/beranda')->with('success','Selamat datang kembali'); 
            }else{
                $kabid = 'Selamat datang kembali '. ucwords(Auth::guard('admin')->user()->nama);
                return redirect('x/beranda')->with('success',$kabid); 
            }
            
        } else {
            \Log::error('Login failed for kabid', ['credentials' => $credentials]);
            return back()->with('warning','Login Gagal, Periksa email atau password anda !!');
        }  
    }

    

    function logout(){
        Auth::logout();
        
        Auth::guard('admin')->logout();
        return redirect('login')->with('success','Anda Berhasil keluar');
    }
}
