@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-hover mt-3">
            <thead>
                <tr class="bg-dark text-white">
                    <th>No</th>
                    <th>Aset</th>
                    <th>Jumlah</th>
                    <th>Jenis Aset</th>
                    <th>Pemegang Aset</th>
                </tr>
            </thead>


            <tbody>
                @foreach($list_aset as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ucwords($item->aset_nama)}}</td>
                    <td>{{$item->aset_qty}} Unit</td>
                    <td>{{ucwords($item->kategori->kategori_nama)}}</td>
                    <td>
                     <table class="table  table-borderless">
                        <tr class="bg-primary text-white">
                            <td>Nama Pemegang</td>
                            <td>Keadaan</td>
                            <td>Nomor Aset</td>
                        </tr>
                        @foreach(App\Models\AsetUnit::where('aset_id',$item->aset_detail_id)->get() as $unit)
                        <tr>
                            <td>{{ucwords($unit->unit_pemegang)}}</td>
                            <td>
                             @if($unit->unit_keadaan == 0)
                             <b class="text-danger">Rusak</b>
                             @elseif($unit->unit_keadaan == 1)
                             <b class="text-warning">Hilang</b>
                             @else
                             <b class="text-success">Baik</b>
                             @endif
                         </td>
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