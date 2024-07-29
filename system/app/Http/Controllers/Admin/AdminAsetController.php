<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aset;
use App\Models\AsetDetail;
use App\Models\AsetUnit;
use App\Models\KategoriAset;
use App\Models\Bidang;
use Str;
use Auth;

class AdminAsetController extends Controller
{
    function index(){
        $data['title'] = "Data Aset";
        $data['list_barang'] = AsetDetail::where('flag_erase',1)->get();
        return view('admin.aset.index',$data);
    }


    function create(){
       $data['title'] = "Buka Data Aset";
       $data['kategori_aset']  = KategoriAset::where('flag_erase',1)->get();
       $data['list_bidang'] = Bidang::where('flag_erase',1)->get();
       return view('admin.aset.create',$data);
   }

   function store(Request $request){
     $request->validate([
        'aset_nama' => 'required|min:1',
    ]); 

     $aset = new Aset;
         // SPK
     $aset->no_surat_pengada = request('no_surat_pengada');
     $aset->tanggal_surat_pengada = request('tanggal_surat_pengada');

         // nama pejabat pengada
     $aset->nip_pejabat_pengada = request('nip_pejabat_pengada');
     $aset->nama_pejabat_pengada = request('nama_pejabat_pengada');
     $aset->jabatan_pejabat_pengada = request('jabatan_pejabat_pengada');

         // vendor
     $aset->nama_vendor = request('nama_vendor');
     $aset->jabatan_vendor = request('jabatan_vendor');
     $aset->akta_notaris_nomor = request('akta_notaris_nomor');
     $aset->tanggal_akta = request('tanggal_akta');
     $aset->notaris = request('notaris');
     $aset->nama_perusahaan = request('nama_perusahaan');
     $aset->save();

         // aset
     $file = $request->file('aset_foto');
     for ($i = 0; $i < count($request->aset_nama); $i++) {

      $rand = Str::random(5) . '-' . Str::random(5);
      $nama_file = 'aset' . '-' . $rand . '-' . time() . '.' . $file[$i]->extension();
      $store = $file[$i]->storeAs('gambar-aset', $nama_file);

      $asetDetail = new AsetDetail;
      $asetDetail->aset_id = $aset->aset_id;
      $asetDetail->aset_kategori_id = $request->aset_kategori_id[$i];
      $asetDetail->aset_bidang_id = $request->aset_bidang_id[$i];
      $asetDetail->aset_nama = $request->aset_nama[$i];
      $asetDetail->aset_qty = $request->aset_qty[$i];
      $asetDetail->aset_harga = $request->aset_harga[$i];
      $asetDetail->aset_tanggal_masuk = $request->aset_tanggal_masuk[$i];
      $asetDetail->aset_foto = $store;
      $asetDetail->save();
  }

  return redirect('admin/aset')->with('success','Data aset berhasil ditambahkan');
}

function asetRusak(){
   $data['title'] = "Data Aset Rusak";
   $data['list_unit'] = AsetUnit::where('unit_keadaan',0)
   ->get();

   $data['asetRusak'] = AsetUnit::where('unit_keadaan',0)
   ->count();
   return view('admin.aset.rusak',$data);
}

function asetHilang(){
   $data['title'] = "Data Aset Hilang";
   $data['list_unit'] = AsetUnit::where('unit_keadaan',1)
   ->get();

   $data['asetHilang'] = AsetUnit::where('unit_keadaan',1)
   ->count();
   return view('admin.aset.hilang',$data);
}

function show(AsetDetail $aset){
    $data['detail'] = $aset;
    $data['title'] = "Data Aset";
    $jumlah = AsetDetail::where('aset_detail_id',$aset->aset_detail_id)->first()->aset_qty;
    $data['jumlah'] = range(0, $jumlah - 1);
    $data['countUnit'] = AsetUnit::where('aset_id',$aset->aset_detail_id)->count();
    $data['list_unit'] = AsetUnit::where('aset_id',$aset->aset_detail_id)->get();
    return view('admin.aset.show',$data);
}

function edit(Aset $aset){
    $data['list_detail'] = AsetDetail::where('aset_id',$aset->aset_id)->get();
    $data['detail'] = Aset::where('aset_id',$aset->aset_id)->first();
    $data['title'] = "Edit Data Aset";
    $data['kategori_aset']  = KategoriAset::where('flag_erase',1)->get();
    $data['list_bidang'] = Bidang::where('flag_erase',1)->get();
    return view('admin.aset.edit',$data);
}

public function update(Aset $aset, Request $request) {

    // Update aset data
    Aset::where('aset_id',$aset->aset_id)->update([
        'no_surat_pengada' => $request->no_surat_pengada,
        'tanggal_surat_pengada' => $request->tanggal_surat_pengada,
        'nip_pejabat_pengada' => $request->nip_pejabat_pengada,
        'nama_pejabat_pengada' => $request->nama_pejabat_pengada,
        'jabatan_pejabat_pengada' => $request->jabatan_pejabat_pengada,
        'nama_vendor' => $request->nama_vendor,
        'jabatan_vendor' => $request->jabatan_vendor,
        'akta_notaris_nomor' => $request->akta_notaris_nomor,
        'tanggal_akta' => $request->tanggal_akta,
        'notaris' => $request->notaris,
        'nama_perusahaan' => $request->nama_perusahaan
    ]);

    $unitIds = $request->input('detail_aset_id'); 
    foreach ($unitIds as $index => $unitId) {
        $unit = AsetDetail::where('aset_detail_id',$unitId)->first();
        if ($unit) {
           AsetDetail::where('aset_detail_id',$unitId)->update([
                'aset_nama' => $request->aset_nama[$index],
                'aset_qty' => $request->aset_qty[$index],
                'aset_harga' => $request->aset_harga[$index],
                'aset_tanggal_masuk' => $request->aset_tanggal_masuk[$index],
                'aset_bidang_id' => $request->aset_bidang_id[$index],
            ]);

            if ($request->hasFile('aset_foto.'.$index)) {
                $file = $request->file('aset_foto.'.$index);
                $fileName = time().'_'.$file->getClientOriginalName();
                $file->storeAs('gambar-aset', $fileName);
                $unit->aset_foto = 'gambar-aset/'.$fileName;
                $unit->save();
            }

            AsetUnit::where('aset_id',$unit->aset_detail_id)->update([
                'bidang_id' => $request->aset_bidang_id[$index]
            ]);
        }
    }

    return back()->with('success', 'Data Aset updated successfully!');
}


function destroy(AsetDetail $aset){
    $aset->flag_erase = 0;
    $aset->save();
    return back()->with('warning','Data berhasil dihapus');
}

}
