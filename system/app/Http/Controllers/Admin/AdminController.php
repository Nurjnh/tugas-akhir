<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AsetDetail;
use App\Models\AsetUnit;

class AdminController extends Controller
{
    function beranda(){
        $data['jumlahAset'] = AsetUnit::count();

        $data['jumlahHilang'] = AsetUnit::where('unit_keadaan',1)->count();

        $data['jumlahBaik'] = AsetUnit::where('unit_keadaan',2)->count();

        $data['jumlahRusak'] = AsetUnit::where('unit_keadaan',0)->count();
         $data['title'] = "Dashboard";
        return view('admin.beranda',$data);
    }
}
