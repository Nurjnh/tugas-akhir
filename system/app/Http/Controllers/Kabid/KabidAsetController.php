<?php

namespace App\Http\Controllers\Kabid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aset;
use App\Models\AsetDetail;
use App\Models\AsetUnit;
use Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;

use Illuminate\Pagination\simplePaginator;



class KabidAsetController extends Controller
{
    function index(){
         $data['title'] = "Data Aset";
        $auth = Auth::guard('admin')->user();
        // $data['list_aset'] = AsetDetail::where('aset_bidang_id',$auth->akun_bidang_id)->simplePaginate(1);
        $data['list_aset'] = AsetDetail::where('aset_bidang_id',$auth->akun_bidang_id)->get();
        return view('kabid.aset.index',$data);
    }

    function show(AsetDetail $asetDetail){
         $data['title'] = "Detail Aset";
        $data['detail'] = $asetDetail;
        $jumlah = AsetDetail::where('aset_detail_id',$asetDetail->aset_detail_id)->first()->aset_qty;
        $data['jumlah'] = range(0, $jumlah - 1);
        $data['countUnit'] = AsetUnit::where('aset_id',$asetDetail->aset_detail_id)->count();
        $data['list_unit'] = AsetUnit::where('aset_id',$asetDetail->aset_detail_id)->get();
        return view('kabid.aset.show',$data);
    }

    function createUnit(Request $request, AsetDetail $asetDetail){
        $count = AsetUnit::where('aset_id',$asetDetail->aset_detail_id)->count();
        for ($i = 0; $i < count($request->unit_pemegang); $i++) {
            $asetUnit = new AsetUnit;
            $asetUnit->aset_id = $asetDetail->aset_detail_id;
            $asetUnit->unit_pemegang = $request->unit_pemegang[$i];
            $asetUnit->unit_keadaan = $request->unit_keadaan[$i];
            $asetUnit->unit_kode = $request->unit_kode[$i];
            $asetUnit->bidang_id = $request->bidang_id;
            $asetUnit->save();
        }

        return back()->with('success','Berhasil diupdate');
    }

    public function updateUnit(Request $request, $id) {
        $unitPemegang = $request->input('unit_pemegang');
        $unitKeadaan = $request->input('unit_keadaan');
        $unitKode = $request->input('unit_kode');
        $unitIds = $request->input('aset_unit_id');
        $bidang = $request->input('bidang_id');
    
        foreach ($unitIds as $index => $unitId) {
            $unit = AsetUnit::find($unitId);
            $unit->unit_pemegang = $unitPemegang[$index];
            $unit->unit_keadaan = $unitKeadaan[$index];
            $unit->unit_kode = $unitKode[$index];
            $unit->bidang_id = $bidang;
            $unit->save();
        }
        
        return back()->with('success', 'Berhasil diupdate');
    }

    function asetRusak(){
        $data['list_unit'] = AsetUnit::where('unit_keadaan',0)
        ->where('bidang_id', Auth::guard('admin')->user()->akun_bidang_id)
        ->get();

        $data['asetRusak'] = AsetUnit::where('unit_keadaan',0)
        ->where('bidang_id', Auth::guard('admin')->user()->akun_bidang_id)
        ->count();
        return view('kabid.aset.rusak',$data);
    }

    function asetHilang(){
        $data['list_unit'] = AsetUnit::where('unit_keadaan',1)
        ->where('bidang_id', Auth::guard('admin')->user()->akun_bidang_id)
        ->get();

        $data['asetHilang'] = AsetUnit::where('unit_keadaan',1)
        ->where('bidang_id', Auth::guard('admin')->user()->akun_bidang_id)
        ->count();
        return view('kabid.aset.hilang',$data);
    }

    public function downloadQr()
    {
        $qrCode = QrCode::format('png')->size(300)->generate('https://www.example.com');

        $fileName = 'qrcode.png';
        $tempImage = tempnam(sys_get_temp_dir(), $fileName);
        file_put_contents($tempImage, $qrCode);

        return response()->download($tempImage, $fileName)->deleteFileAfterSend(true);
    }
}
