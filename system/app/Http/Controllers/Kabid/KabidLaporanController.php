<?php

namespace App\Http\Controllers\Kabid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AsetDetail;

class KabidLaporanController extends Controller
{
    function index(){
         $data['title'] = "Laporan Aset";
        $data['list_aset'] = AsetDetail::all();
        return view('kabid.laporan.index',$data);
    }
}
