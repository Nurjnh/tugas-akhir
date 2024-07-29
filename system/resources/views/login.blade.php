
<!DOCTYPE html>
<html lang="en">

<head>
  @include('template.assets')
</head>

<body class="bg-default">
  <div class="main-content">

    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center ">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <img src="{{url('public/assets/img/icons/ktp.png')}}" width="80px" alt="">
              <h1 class="text-white">Selamat Datang di MONAS!</h1>
              <p class="text-lead text-light">(Monitoring Aset Dinas)</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-2">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary mb-5 shadow border-0">
            <div class="card-header bg-transparent">
              <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted">
                  <small>Silahkan masuk terlebih dahulu !!! <br></small>
                  @if(session('success'))
                  <div>{{ session('success') }}</div>
                  @endif

                  @if(session('warning'))
                  <div>{{ session('warning') }}</div>
                  @endif
                </div>
                <form action="{{url('login')}}" method="POST">
                  @csrf
                  <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                      <input class="form-control" placeholder="Email" name="email" id="email" type="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" placeholder="Password" id="password" name="password" type="password">
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-block btn-primary my-4">Masuk</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('template.js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Notifikasi -->
    @foreach(['success', 'warning', 'error', 'info'] as $status)
    @if (session($status))
    <script>
      Swal.fire({
        icon: "{{ $status }}",
        title: "{{ Str::upper($status) }}",
        text: "{{ session($status) }}!",
        showConfirmButton: false,
        timer: 15000
      })
    </script>
    @endif
    @endforeach
  </body>

  </html>