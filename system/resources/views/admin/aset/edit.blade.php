@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        <center>
            <h1>FORM EDIT DATA ASET</h1>
        </center>

        <form action="{{ url('admin/aset', $detail->aset_id) }}/edit" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mt-3">
                    <h3>1. Surat Perintah Kerja</h3>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>No Surat Pengada</span>
                        <input type="text" required name="no_surat_pengada" value="{{ $detail->no_surat_pengada }}" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Tanggal Surat Pengada</span>
                        <input type="date" required name="tanggal_surat_pengada" value="{{ $detail->tanggal_surat_pengada }}" class="form-control">
                    </div>
                </div>

                <!-- NAMA PEJABAT PENGADA -->
                <div class="col-md-12 mt-3">
                    <h3>2. Data Pejabat Pengada</h3>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Nama Pejabat Pengada</span>
                        <input type="text" required name="nama_pejabat_pengada" value="{{ $detail->nama_pejabat_pengada }}" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Nip Pejabat Pengada</span>
                        <input type="number" required name="nip_pejabat_pengada" value="{{ $detail->nip_pejabat_pengada }}" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Jabatan Pejabat Pengada</span>
                        <input type="text" required name="jabatan_pejabat_pengada" value="{{ $detail->jabatan_pejabat_pengada }}" class="form-control">
                    </div>
                </div>

                <div class="col-md-6"></div>

                <div class="col-md-12 mt-3">
                    <h3>3. Data Vendor</h3>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Nama Perusahaan/PT/CV</span>
                        <input type="text" required name="nama_perusahaan" value="{{ $detail->nama_perusahaan }}" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Nama Vendor</span>
                        <input type="text" required name="nama_vendor" value="{{ $detail->nama_vendor }}" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Jabatan Vendor</span>
                        <input type="text" required name="jabatan_vendor" value="{{ $detail->jabatan_vendor }}" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Akta Notaris Vendor</span>
                        <input type="text" required name="akta_notaris_nomor" value="{{ $detail->akta_notaris_nomor }}" class="form-control">
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <h3>4. Data Aset</h3>
                </div>
                @foreach($list_detail as $item)
                <input type="hidden" name="detail_aset_id[]" value="{{ $item->aset_detail_id}}">
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Kategori Aset</span>
                        <select name="aset_kategori_id[]" required class="form-control">
                            <option value="" hidden> -- Pilih Kategori Aset --</option>
                            @foreach($kategori_aset as $kategori)
                            <option value="{{ $kategori->kategori_id }}" @if($kategori->kategori_id == $item->aset_kategori_id) selected @endif>{{ ucwords($kategori->kategori_nama) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Nama Barang/Aset</span>
                        <input type="text" value="{{ $item->aset_nama }}" required name="aset_nama[]" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Jumlah Aset</span>
                        <input type="number" required name="aset_qty[]" value="{{ $item->aset_qty }}" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Harga satuan aset</span>
                        <input type="number" required name="aset_harga[]" value="{{ $item->aset_harga }}" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Tanggal diterima aset</span>
                        <input type="date" required name="aset_tanggal_masuk[]" value="{{ $item->aset_tanggal_masuk }}" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Bidang Pemegang Aset</span>
                        <select name="aset_bidang_id[]" class="form-control" required>
                            <option value="" hidden>--Pilih Bidang--</option>
                            @foreach($list_bidang as $bidang)
                            <option value="{{ $bidang->bidang_id }}" @if($bidang->bidang_id == $item->aset_bidang_id) selected @endif>{{ ucwords($bidang->bidang_nama) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Gambar Aset</span>
                        <input type="file" name="aset_foto[]" accept="image/*" class="form-control">
                    </div>
                </div>
                <div class="col-md-12 mb-5"></div>
                @endforeach

                <div class="col-md-12">
                    <button class="btn btn-primary float-right">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection