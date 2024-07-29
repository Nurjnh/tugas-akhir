@php
 function checkRouteActive($route){
  if(Route::current()->uri == $route) return 'active';
}
@endphp
 <style>
   .active{
    color: #5343EB !important;
    font-weight: bold;
   }
 </style>
@if(Auth::guard('admin')->user()->level == 1)
  <li class="nav-item ">
    <a class="nav-link  {{checkRouteActive('admin/beranda')}} " href="{{url('admin/beranda')}}">
      <i class="fa fa-home"></i> Dashboard
    </a>
  </li>
  

  <li class="nav-item">
    <a class="nav-link {{checkRouteActive('admin/aset')}} {{ request()->is('admin/aset/*') ? 'active':'' }}" href="{{url('admin/aset')}}">
     <i class="fa fa-archive" aria-hidden="true"></i> Data Aset
    </a>
  </li>


  <li class="nav-item">
    <a class="nav-link {{checkRouteActive('admin/permohonan-aset-baru')}}" href="{{url('admin/permohonan-aset-baru')}}">
      <i class="fa fa-users"></i> Permohonan Aset Baru
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link {{checkRouteActive('admin/pemegang-aset')}}" href="{{url('admin/pemegang-aset')}}">
      <i class="fa fa-users"></i> Data Pemegang Aset
    </a>
  </li>


  <li class="nav-item">
    <a class="nav-link {{checkRouteActive('admin/data-pemegang-akun')}}" href="{{url('admin/data-pemegang-akun')}}">
      <i class="fa fa-users"></i> Data Akun Kabid
    </a>
  </li>


   <li class="nav-item">
    <a class="nav-link {{checkRouteActive('admin/kategori-aset')}}" href="{{url('admin/kategori-aset')}}">
     <i class="fa fa-star"></i> Kategori Aset
    </a>
  </li>


  <li class="nav-item">
    <a class="nav-link {{checkRouteActive('admin/aset-rusak')}}" href="{{url('admin/aset-rusak')}}">
      <i class="fa fa-times"></i> Aset Rusak
    </a>
  </li>


  <li class="nav-item">
    <a class="nav-link {{checkRouteActive('admin/aset-hilang')}}" href="{{url('admin/aset-hilang')}}">
      <i class="fa fa-question"></i> Aset Hilang
    </a>
  </li>

    <li class="nav-item">
    <a class="nav-link {{checkRouteActive('admin/laporan-aset',date('Y'))}} " href="{{url('admin/laporan-aset',date('Y'))}}">
      <i class="fa fa-book"></i> Laporan Aset
    </a>
  </li>


  <li class="nav-item">
    <a class="nav-link {{checkRouteActive('admin/bidang')}}" href="{{url('admin/bidang')}}">
      <i class="fa fa-user"></i> Data Bidang
    </a>
  </li>


  <li class="nav-item">
    <a class="nav-link {{checkRouteActive('admin/profil')}}" href="{{url('admin/profil')}}">
      <i class="fa fa-user"></i> Profil Akun
    </a>
  </li>


  {{-- KHUSUS KABID --}}
  @else
  <li class="nav-item ">
    <a class="nav-link  {{checkRouteActive('x/beranda')}} " href="{{url('x/beranda')}}">
      <i class="fa fa-home"></i> Dashboard
    </a>
  </li>
  

  <li class="nav-item">
    <a class="nav-link {{checkRouteActive('x/aset')}} {{ request()->is('x/aset/*') ? 'active':'' }}" href="{{url('x/aset')}}">
     <i class="fa fa-archive" aria-hidden="true"></i> Data Aset Bidang
    </a>
  </li>


  <li class="nav-item">
    <a class="nav-link {{checkRouteActive('x/permohonan-aset-baru')}} {{ request()->is('x/permohonan-aset-baru/*') ? 'active':'' }}" href="{{url('x/permohonan-aset-baru')}}">
      <i class="fa fa-users"></i> Permohonan Aset Baru
    </a>
  </li>



  <li class="nav-item">
    <a class="nav-link {{checkRouteActive('x/aset-rusak')}} {{ request()->is('x/aset-rusak/*') ? 'active':'' }}" href="{{url('x/aset-rusak')}}">
      <i class="fa fa-times"></i> Aset Rusak
    </a>
  </li>


  <li class="nav-item">
    <a class="nav-link {{checkRouteActive('x/aset-hilang')}} {{ request()->is('x/aset-hilang/*') ? 'active':'' }}" href="{{url('x/aset-hilang')}}">
      <i class="fa fa-question"></i> Aset Hilang
    </a>
  </li>

    <li class="nav-item">
    <a class="nav-link {{checkRouteActive('x/laporan-aset')}} {{ request()->is('x/laporan/*') ? 'active':'' }}" href="{{url('x/laporan-aset')}}">
      <i class="fa fa-book"></i> Laporan Aset
    </a>
  </li>


  <li class="nav-item">
    <a class="nav-link {{checkRouteActive('x/profil')}} {{ request()->is('x/profil/*') ? 'active':'' }}" href="{{url('x/profil')}}">
      <i class="fa fa-user"></i> Profil Akun
    </a>
  </li>
  @endif


