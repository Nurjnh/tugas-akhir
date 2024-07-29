<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Bidang;
class AdminAkunController extends Controller
{
    function index(){
        $data['list_akun'] = Admin::where('level',2)
        ->where('flag_erase',1)
        ->get();
        $data['list_bidang'] = Bidang::where('flag_erase',1)->get();

         $data['title'] = "Akun Bidang";
        return view('admin.akun.index',$data);
    }

    function store(){
        $akun = new Admin;
        $akun->nama = request('akun_nama');
        $akun->nip = request('nip');
        $akun->akun_bidang_id = request('akun_bidang_id');
        $akun->email = request('email');
        $akun->level = 2;
        $akun->jabatan = request('jabatan');
        $akun->password = bcrypt(12345);
        $akun->save();

        return back()->with('success','Kabid berhasil dibuat');
    }

    function destroy(Admin $admin){
        $admin->flag_erase = 0;
        $admin->save();
        return back()->with('warning','Akun berhasil dihapus');
    }
}
