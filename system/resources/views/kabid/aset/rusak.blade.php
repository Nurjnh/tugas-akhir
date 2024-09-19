@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        <center>
            <h1>Data Aset Rusak</h1>
        </center>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-4">
        <div class="card text-white">
            <div class="card-body bg-danger ">
                <h1 class="text-white">Aset Rusak</h1>
                <h1 class="text-white float-right">{{$asetRusak}} Unit</h1>
            </div>
        </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead>
                <tr class=" bg-primary text-white">
                    <th>No</th>
                    <th>Aksi</th>
                    <th>Nama Pemegang</th>
                    <th>Nama Aset</th>
                    <th>Bidang</th>
                    <th>Nomor Aset</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list_unit as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="{{url('x/aset',$item->aset_id)}}/detail" class="btn btn-dark"><i class="fa fa-eye"></i> Detail Aset</a></td>
                    <td>{{ucwords($item->unit_pemegang)}}</td>
                    <td>{{ucwords($item->detail->aset_nama)}}</td>
                    <td>{{ucwords($item->bidang->bidang_nama)}}</td>
                    <td>{{strtoupper($item->unit_kode)}}</td>
                    <td class="text-warning">Rusak</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection