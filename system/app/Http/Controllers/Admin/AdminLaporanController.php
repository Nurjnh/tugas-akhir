<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AsetDetail;
use App\Models\Bidang;

class AdminLaporanController extends Controller
{
  function index($tahun){
    $data['tahun_link'] = $tahun;
    $data['list_aset'] = AsetDetail::whereYear('created_at',$tahun)->get();
    $data['list_bidang'] = Bidang::where('flag_erase',1)->get();
    $data['title'] = "Laporan Aset";
    return view('admin.laporan.index',$data);
  }

  function laporanBidang($tahun, Bidang $bidang){
   $data['tahun_link'] = $tahun;
    $data['title'] = "Laporan Aset";
   $data['bidang'] = $bidang;
   $data['list_aset'] = AsetDetail::whereYear('created_at',$tahun)
   ->where('aset_bidang_id',$bidang->bidang_id)
   ->get();
   $data['list_bidang'] = Bidang::where('flag_erase',1)->get();
   return view('admin.laporan.index',$data);
 }

 function cetak($tahun){
   $data['tahun_link'] = $tahun;
   $data['list_aset'] = AsetDetail::whereYear('created_at',$tahun)->get();
   return view('admin.laporan.cetak',$data);
 }

}
