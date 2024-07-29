@extends('template.base')
@section('content')

<div class="row" style="color:#ffffff !important">
    <div class="col-md-3">
        <div class="card bg-primary text-white">
            <a href="{{url('admin/aset')}}">
            <div class="card-body">
                <center>
                    <h2 class="text-white">Jumlah Aset</h2>
                    <h2 class="text-white">{{$jumlahAset}}</h2>
                </center>
            </div>
        </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-danger text-white">
            <a href="{{url('admin/aset')}}">
            <div class="card-body">
                <center>
                    <h2 class="text-white">Aset Rusak</h2>
                    <h2 class="text-white">{{$jumlahRusak}}</h2>
                </center>
            </div>
        </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white">
            <a href="{{url('admin/aset')}}">
            <div class="card-body">
                <center>
                    <h2 class="text-white">Aset Baik</h2>
                    <h2 class="text-white">{{$jumlahBaik}}</h2>
                </center>
            </div>
            </a>
        </div>
    </div>

     <div class="col-md-3">
        <div class="card bg-info text-white">
            <a href="{{url('admin/aset')}}">
            <div class="card-body">
                <center>
                    <h2 class="text-white">Aset Hilang</h2>
                    <h2 class="text-white">{{$jumlahHilang}}</h2>
                </center>
            </div>
            </a>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-8">
       <div class="card">
        <div class="card-body">
            <canvas id="myChart"></canvas>
        </div>
       </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <center>
                    <img src="" onerror="this.src='{{url('public/assets/img/icons/ktp.png')}}';"
                alt="" width="50%"> <br>

                <b>{{strtoupper(Auth::guard('admin')->user()->nama)}}</b>
                <p>({{ucwords(Auth::guard('admin')->user()->jabatan)}})</p>
                </center>
                
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Jumlah Aset','Aset Baik', 'Aset Rusak', 'Aset Hilang' ],
      datasets: [{
        label: '# Diagram Aset',
        data: [{{$jumlahAset}}, {{$jumlahBaik}}, {{$jumlahRusak}}, {{$jumlahHilang}}],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
@endsection