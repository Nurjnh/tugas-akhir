@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        <center>
            <h3>Data Akun Tiap Bidang</h3>
        </center>

        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
    Buat Akun Baru
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Akun Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{url('admin/bidang/create')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <span>Nama Bidang</span>
            <input type="text" name="bidang_nama" class="form-control" required>
        </div>

        <div class="form-group">
            <button class="btn btn-primary">Buat Akun</button>
        </div>

        </form>
        </div>
      </div>
    </div>
  </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Aksi</th>
                    <th>Nama Bidang</th>
                </tr>
            </thead>

            @foreach($list_bidang as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td><a href="{{url('admin/bidang',$item->bidang_id)}}/delete" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a></td>
                <td>{{ucwords($item->bidang_nama)}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>


@endsection