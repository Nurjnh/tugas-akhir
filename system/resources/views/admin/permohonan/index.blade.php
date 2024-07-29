@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        <center>
            <h3>DATA PERMOHONAN ASET</h3>
        </center>
    </div>
</div>
@foreach($list_permohonan as $item)
<div class="card mt-3">
    <div class="card-body">
        <b>{{ucwords($item->nama_barang)}} ({{$item->qty_barang}} Unit)</b> <br>
        <br>Akun : {{ucwords($item->author->nama ?? 'Tidak ditemukan')}} | {{ucwords($item->bidang->bidang_nama ?? 'Tidak ditemukan')}} <br>
        {!!nl2br($item->deskripsi_barang)!!} <br>
        @if($item->status == 1)
        <span class="badge badge-success">Diterima</span>
        @elseif($item->status == 2)
        <span class="badge badge-danger">Ditolak</span>
        @else
        <a href="{{url('admin/permohonan-aset-baru',$item->aset_permohonan_id)}}/terima" onclick="return confirm('Yakin Terima?')" class="btn btn-sm mt-3 btn-success">Terima</a>
        <a href="{{url('admin/permohonan-aset-baru',$item->aset_permohonan_id)}}/tolak" onclick="return confirm('Yakin Tolak?')" class="btn btn-sm mt-3 btn-danger">Tolak</a>
        @endif
    </div>
</div>
@endforeach

@endsection