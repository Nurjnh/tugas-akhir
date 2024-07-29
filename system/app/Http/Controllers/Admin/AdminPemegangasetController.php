<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AsetUnit;
use App\Models\AsetDetail;

class AdminPemegangasetController extends Controller
{
    function index(){
        $data['list_aset'] = AsetDetail::all();
        $data['list_unit'] = AsetUnit::all();
         $data['title'] = "Data Pemegang Aset";
        return view('admin.pemegang-aset.index',$data);
    }
}
