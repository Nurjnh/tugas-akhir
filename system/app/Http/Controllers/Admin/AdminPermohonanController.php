<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AsetPermohonan;

class AdminPermohonanController extends Controller
{
    function index(){
        $data['list_permohonan'] = AsetPermohonan::all();
         $data['title'] = "Data Permohonan Aset";
        return view('admin.permohonan.index',$data);
    }

    function terima(AsetPermohonan $permohonan){
        $permohonan->status = 1;
        $permohonan->save();
        return back()->with('success','Permohonan aset diterima');
    }

    function tolak(AsetPermohonan $permohonan){
        $permohonan->status = 2;
        $permohonan->save();
        return back()->with('success','Permohonan aset ditolak');
        }
}
