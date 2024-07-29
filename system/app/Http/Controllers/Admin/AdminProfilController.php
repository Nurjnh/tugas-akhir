<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;

class AdminProfilController extends Controller
{
    function index(){
         $data['title'] = "Profil Akun";
        return view('admin.profil.index');
    }

    function edit(Admin $admin){
        $data['admin'] = $admin;
         $data['title'] = "Edit Akun";
        $data['list_bidang'] = Bidang::where('flag_erase',1)->get();
        return view('admin.profil.edit',$data);
    }

    function updatePassword(Request $request){
        // Validasi input
        $request->validate([
            'new_password_confirmation' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $new = request('new_password');
        $konfirm = request('new_password_confirmation');
        $user = Auth::guard('admin')->user();

        if($konfirm == $new){
            Admin::where('admin_id',$user->admin_id)->update([
                'password' => bcrypt($new)
            ]);
            return redirect('logout')->with('success','Password berhasil diganti, Silahan masuk kembali');
        }else{
            return back()->with('success','Password tidak sama');
        }
    }

    function update(Admin $admin){
        $admin->email = request('email');
        $admin->handleUploadFOto();
        $admin->save();
        return redirect('x/profil')->with('success','Profil berhasil diupdate');
    }
}
