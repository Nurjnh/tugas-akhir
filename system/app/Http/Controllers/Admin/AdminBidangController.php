<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bidang;

class AdminBidangController extends Controller
{
    function index(){
        $data['list_bidang'] = Bidang::where('flag_erase',1)->get();
         $data['title'] = "Data Bidang";
        return view('admin.bidang.index',$data);
    }

    function store(){
        $bidang = new Bidang;
        $bidang->bidang_nama = request('bidang_nama');
        $bidang->save();
        return back()->with('success','Data bidang berhasil ditambah');
    }

    function destroy(Bidang $bidang){
        $bidang->flag_erase = 0;
        $bidang->save();
        return back()->with('warning','Data bidang berhasil dihapus');
    }
}
