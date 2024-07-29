@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-bordered mt-3">
            <thead>
                <tr class="bg-dark text-white">
                    <th>No</th>
                    <th>Aset</th>
                    <th>Jumlah</th>
                    <th>Kategori</th>
                    <th>Pemegang Aset</th>
                </tr>
            </thead>
        
        
            <tbody>
                @foreach($list_aset as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->aset_nama}}</td>
                    <td>{{$item->aset_qty}} Unit</td>
                    <td>{{ucwords($item->kategori->kategori_nama)}}</td>
                    <td>
                       <table class="table  table-borderless">
                        @foreach(App\Models\AsetUnit::where('aset_id',$item->aset_detail_id)->get() as $unit)
                        <tr>
                            <td>{{$unit->unit_pemegang}}</td>
                            <td>{{$unit->unit_keadaan}}</td>
                            <td>{{$unit->unit_kode}}</td>
                        </tr>
                        @endforeach
                       </table>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection