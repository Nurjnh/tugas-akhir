<?php

namespace App\Http\Controllers\Kabid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AsetPermohonan;
use Auth;
class KabidPermohonanController extends Controller
{
    function index(){
        $auth = Auth::guard('admin')->user();
        $data['jumlahPermohonan'] = AsetPermohonan::count();
        $data['list_permohonan'] = AsetPermohonan::where('author_id',$auth->admin_id)->get();
        $data['title'] = "Permohonan Aset Baru";
        return view('kabid.permohonan.index',$data);
    }

    function create(){
       $data['title'] = "Permohanan Aset baru";
       return view('kabid.permohonan.create');
   }

   function store(){
    $aset = new AsetPermohonan;
    $aset->nama_barang = request('nama_barang');
    $aset->qty_barang = request('qty_barang');
    $aset->deskripsi_barang = request('deskripsi_barang');
    $aset->author_id = Auth::guard('admin')->user()->admin_id;
    $aset->bidang_id = Auth::guard('admin')->user()->akun_bidang_id;
    $aset->save();
    return redirect('x/permohonan-aset-baru')->with('success','Permintaan berhasil dikirim');
}
}
