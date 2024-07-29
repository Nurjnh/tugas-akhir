@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        <center>
            <h1>Update Profil</h1>
        </center>
    </div>
</div>

<div class="card mt-5">
    <div class="card-body">
        <form action="{{url('x/profil',Auth::guard('admin')->id())}}/edit" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Nama Pemilik Akun</span>
                        <input type="text" name="akun_nama" readonly value="{{ucwords(Auth::guard('admin')->user()->nama)}}" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <span>NIP Pemilik Akun</span>
                        <input type="text" name="nip" class="form-control" readonly required value="{{ucwords(Auth::guard('admin')->user()->nip)}}">
                    </div>
                </div>
            
           
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Jabatan</span>
                        <input type="text" name="jabatan" class="form-control" readonly required value="{{ucwords(Auth::guard('admin')->user()->jabatan)}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Email</span>
                        <input type="text" name="email" class="form-control" required value="{{ucwords(Auth::guard('admin')->user()->email)}}">
                    </div>
                </div>
            
           
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Bidang</span>
                        <select name="akun_bidang_id" id="" class="form-control" readonly>
                           
                            @foreach ($list_bidang as $item)
                                <option  @if(Auth::guard('admin')->user()->akun_bidang_id == $item->bidang_id)  selected @endif value="{{$item->bidang_id}}" >{{ucwords($item->bidang_nama)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Foto</span>
                        <input type="file" class="form-control" accept="image/*" name="foto">
                    </div>
                </div>
            </div>

        <button class="btn btn-success">Simpan</button>
          </form>
    </div>
</div>

@endsection