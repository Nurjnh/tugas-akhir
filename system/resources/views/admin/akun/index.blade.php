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
            <form action="{{url('admin/data-pemegang-akun/create')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <span>Nama Pemilik Akun</span>
                <input type="text" name="akun_nama" class="form-control" required>
              </div>

              <div class="form-group">
                <span>NIP Pemilik Akun</span>
                <input type="text" name="nip" class="form-control" required>
              </div>

              <div class="form-group">
                <span>Jabatan</span>
                <input type="text" name="jabatan" class="form-control" required>
              </div>

              <div class="form-group">
                <span>Email</span>
                <input type="text" name="email" class="form-control" required>
              </div>

              <div class="form-group">
                <span>Bidang</span>
                <select name="akun_bidang_id" id="" class="form-control">
                  <option value="" hidden>-- Bidang Pemilik Akun --</option>
                  @foreach ($list_bidang as $item)
                  <option value="{{$item->bidang_id}}">{{ucwords($item->bidang_nama)}}</option>
                  @endforeach
                </select>
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
    <table class="table table-hover table-bordered">
      <thead>
        <tr class="bg-primary text-white">
          <th>No</th>
          <th>Nama </th>
          <th>Email</th>
          <th>Jabatan</th>
          <th>Bidang</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        @foreach($list_akun as $akun)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{ucwords($akun->nama)}} <br>
            NIP.{{ucwords($akun->nip)}}
          </td>
          <td>{{ucwords($akun->email)}}</td>
          <td>{{ucwords($akun->jabatan)}}</td>
          <td>{{ucwords($akun->bidang->bidang_nama)}}</td>
          <td>
            <a href="{{url('admin/data-pemegang-akun',$akun->admin_id)}}/delete" class="btn btn-danger" onclick="return confirm('Yakin menghapus akun ini?')">Hapus</a>
          </td>
        </tr>
        @endforeach
      </tbody>

      <tfoot>
        <tr class="bg-primary text-white">
         <th>No</th>
          <th>Nama </th>
          <th>Email</th>
          <th>Jabatan</th>
          <th>Bidang</th>
          <th>Aksi</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>


@endsection