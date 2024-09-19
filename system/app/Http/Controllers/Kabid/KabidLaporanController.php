<?php

namespace App\Http\Controllers\Kabid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AsetDetail;

class KabidLaporanController extends Controller
{
  function index($tahun){
    $data['tahun_link'] = $tahun;
    $data['list_aset'] = AsetDetail::whereYear('created_at',$tahun)->get();
    $data['title'] = "Laporan Aset";
    return view('kabid.laporan.index',$data);
}
}
