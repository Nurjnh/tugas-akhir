<!DOCTYPE html>
<html lang="en">

<head>
  @include('template.assets')
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <style>
   
    .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #4444; /* Atur warna latar belakang preloader */
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 999999999;
    }
  </style>
</head>

<body class="">
  <div class="preloader text-white" style="color:#F54E27 ; font-size: 16pt;">
    <i class="fa fa-spinner fa-spin mr-3"></i> &nbsp;<b>  Mohon bersabar ...</b>
  </div>

  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="#">
        <img src="{{url('public')}}/assets/img/icons/ktp.png" class="navbar-brand-img" alt="..."><br>
        <h3><b>MONAS</b></h3>
        <p>(Monitoring Aset Dinas)</p>
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="{{asset('system/public')}}/{{Auth::guard('admin')->user()->foto}}
                  ">
                </span>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="{{url('public')}}/examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{url('logout')}}" onclick="return confirm('Yakin untuk keluar?')" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="{{url('public')}}/index.html">
                  <img src="{{url('public')}}/assets/img/brand/blue.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navigation -->
          <ul class="navbar-nav">
            @include('template.sidebar')
          </ul>


        </div>
      </div>
    </nav>
    <div class="main-content">
      <!-- Navbar -->
      <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
          <!-- Brand -->
          <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{url('public')}}/index.html">{{$title ?? ''}} </a>
          <!-- Form -->
        
          <!-- User -->
          
          <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" class="rounded-circle" src="{{asset('system/public')}}/{{Auth::guard('admin')->user()->foto}}" style="background-size:cover">
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{ucwords(Auth::guard('admin')->user()->nama)}}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                <div class=" dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Selamat datang!</h6>
                </div>
                <div class="dropdown-divider"></div>
                <a href="{{url('logout')}}" onclick="return confirm('Yakin untuk keluar?')" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- Header -->
      <div class="header bg-gradient-primary pt-5 pt-md-8">
       
      </div>
      <div class="container-fluid mt-3">
        @yield('content')
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



    <script>
      document.addEventListener("DOMContentLoaded", function () {
  // Simulasikan penundaan selama 2 detik (sesuaikan dengan kebutuhan)
        setTimeout(function () {
      // Sembunyikan preloader
          document.querySelector(".preloader").style.display = "none";
      // Tampilkan konten website
          document.querySelector(".content").style.display = "block";
  }, 500); // 2000 milidetik = 2 detik
      });
    </script>
  </body>

  </html>