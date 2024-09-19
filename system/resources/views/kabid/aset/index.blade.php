@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        <center>
            <h3>Data Aset</h3>
        </center>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">
        <table class="table table-hover table-bordered table-striped" id="dataTable">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama Aset</th>
                    <th>Jenis Aset</th>
                    <th>Jumlah/Unit</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($list_aset as $item)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{ucwords($item->aset_nama)}}</td>
                    <td>{{ucwords($item->kategori->kategori_nama)}}</td>
                    <td>{{$item->aset_qty}} Unit</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{url('x/aset',$item->aset_detail_id)}}/detail" class="btn btn-dark"><i class="fa fa-pen"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama Aset</th>
                    <th>Jenis Aset</th>
                    <th>Jumlah/Unit</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </tfoot>
        </table>


    </div>
</div>


<script>
    let table = new DataTable('#myTable');

</script>
<script>
   
    $(document).ready( function () {
        $('#dataTable').DataTable();
    } );
</script>
@endsection