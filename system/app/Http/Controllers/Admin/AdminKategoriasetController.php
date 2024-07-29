<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriAset;

class AdminKategoriasetController extends Controller
{
    function index(){
        $data['list_kategori'] = KategoriAset::where('flag_erase',1)->get();
         $data['title'] = "Kategori Aset";
        return view('admin.kategori-aset.index',$data);
    }

    function store(Request $request){

        $request->validate([
            'kategori_nama' => 'unique:kategori_aset|required|min:1',
        ],[
            'kategori_nama.unique' => 'Nama kategori sudah ada.',
            'kategori_nama.required' => 'Nama kategori harus diisi.',
            'kategori_nama.min' => 'Nama kategori minimal :min karakter.',
        ]);
        $kategori = new KategoriAset;
        $kategori->kategori_nama = request('kategori_nama');
        $kategori->save();

        return back()->with('success','Data berhasil dibuat');

    }

    function destroy(KategoriAset $kategori){
        $kategori->flag_erase = 0;
        $kategori->save();
        return back()->with('warning','Data berhasil dihapus');
    }
}
