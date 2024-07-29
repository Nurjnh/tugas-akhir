<?php

namespace App\Http\Controllers\Kabid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\AsetDetail;
use App\Models\AsetUnit;


class KabidController extends Controller
{
    function beranda(){
         $data['title'] = "Dashboard";
        $auth = Auth::guard('admin')->user();
        $data['asetBidang'] = AsetDetail::where('aset_bidang_id',$auth->akun_bidang_id)->sum('aset_qty');
        $data['total'] = AsetUnit::where('bidang_id',$auth->akun_bidang_id)->count();
        $data['hilang'] = AsetUnit::where('bidang_id',$auth->akun_bidang_id)->where('unit_keadaan',1)->count();
        $data['baik'] = AsetUnit::where('bidang_id',$auth->akun_bidang_id)->where('unit_keadaan',2)->count();
        $data['rusak'] = AsetUnit::where('bidang_id',$auth->akun_bidang_id)->where('unit_keadaan',0)->count();
        return view('kabid.beranda',$data);
    }
}
