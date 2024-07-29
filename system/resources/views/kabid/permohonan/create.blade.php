@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        <center>
            <h1>Form Permintaan Aset Baru</h1>
        </center>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">
        <form action="{{url('x/permohonan-aset-baru/create')}}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <span>Nama Barang</span>
                    <input type="text" class="form-control" name="nama_barang" required>
                </div>
                <div class="col-md-6">
                    <span>Jumlah Unit Barang</span>
                    <input type="number" class="form-control" name="qty_barang" required>
                </div>

                <div class="col-md-12">
                    <span>Deskrisi Permintaan</span>
                    <textarea name="deskripsi_barang" class="form-control" id="summernote" required></textarea>
                </div>

                <div class="col-md-12">
                    <button class="btn btn-primary float-right mt-3"><i class="fa fa-sand"></i> Kirim Permintaan</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection