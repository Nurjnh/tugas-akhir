@extends('template.base')
@section('content')
<div class="card">
    <div class="card-body">
        <center>
            <h1>Data Permintaan Aset</h1>
        </center>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">
        <div class="row">
         <div class="col-md-12">
            <a href="{{url('x/permohonan-aset-baru/create')}}" class="btn btn-success float-right mt-3 mb-2">Buat Permintaan</a> <br> <br>
        </div>
        @foreach($list_permohonan->sortByDesc('created_at') as $item)
        <div class="col-md-12 mt-5">
         <div class="card">
            <div class="card-body">

                <b>{{ucwords($item->nama_barang)}} ({{$item->qty_barang}} Unit) | Dibuat Pada {{$item->created_at}}</b> <br>
                {!!nl2br($item->deskripsi_barang)!!} <br>
                @if($item->status == 1)
                <span class="badge badge-success">Diterima</span>
                @elseif($item->status == 2)
                <span class="badge badge-danger">Ditolak</span>
                @else
                <span class="badge badge-warning">Permohonan Baru</span>
                @endif
                
            </div>
        </div>
    </div>
    @endforeach
</div>


</div>
</div>

@endsection