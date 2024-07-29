@extends('template.base')
@section('content')

<div class="card">
    <div class="card-bod">
        <center>
            <h1>Profil Akun</h1>
        </center>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-4">
        {{-- image --}}
        <img src="{{asset('system/public')}}/{{Auth::guard('admin')->user()->foto}}" width="100%" style="border-radius: 5px" alt="">
    </div>


    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                @error('new_password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
                <b>Biodata Diri</b>
                <a href="{{url('x/profil',Auth::guard('admin')->id())}}/edit" class="btn float-right btn-sm btn-dark"><i class="fa fa-pen"></i> Edit</a>
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td>: {{ucwords(Auth::guard('admin')->user()->nama)}}</td>
                    </tr>

                    <tr>
                        <th>NIP</th>
                        <td>: {{ucwords(Auth::guard('admin')->user()->nip)}}</td>
                    </tr>

                    <tr>
                        <th>Jabatan</th>
                        <td>: {{ucwords(Auth::guard('admin')->user()->jabatan)}}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>: {{ucwords(Auth::guard('admin')->user()->email)}}</td>
                    </tr>
                </table>

                <button class="btn btn-danger btn-ssm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Ganti Password
                  </button>
                
            </div>
        </div>

        <div class="collapse mt-3" id="collapseExample">
            <div class="card card-body">
                <center>
                    <h3>Form Ganti Passsword</h3>
                </center>
             <form action="{{url('x/profil/ganti-password')}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <span>Password Baru</span>
                    <input type="password" name="new_password" class="form-control" required>
                 
                </div>
                <div class="form-group mb-3">
                    <span>Konfirmasi Password Baru</span>
                    <input type="password" name="new_password_confirmation" class="form-control" required>
                  
                </div>

                <button class="btn btn-danger">Ganti Password</button>
             </form>
            </div>
          </div>

    </div>
</div>

@endsection