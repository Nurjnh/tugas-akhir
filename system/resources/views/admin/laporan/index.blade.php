@extends('template.base')
@section('content')

<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <div class="dropdown">
                    <button class="btn btn-dark float-right dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-filter"></i> Filter Tahun
                    </button>
                    <div class="dropdown-menu">
                       
                         <a class="dropdown-item" href="{{url('admin/laporan-aset')}}/{{date('Y') }}/{{$bidang->bidang_id ?? ''}}">{{date('Y')}}</a>
                         <a class="dropdown-item" href="{{url('admin/laporan-aset')}}/{{date('Y') - 1 }}/{{$bidang->bidang_id ?? ''}}">{{date('Y') - 1}}</a> 
                         <a class="dropdown-item" href="{{url('admin/laporan-aset')}}/{{date('Y') - 2 }}/{{$bidang->bidang_id ?? ''}}">{{date('Y') - 2}}</a>
                          <a class="dropdown-item" href="{{url('admin/laporan-aset')}}/{{date('Y') - 3 }}/{{$bidang->bidang_id ?? ''}}">{{date('Y') - 3}}</a>
                    </div>
                  </div>

                     <div class="dropdown">
                    <button class="btn btn-dark float-right dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-filter"></i> Filter Bidang
                    </button>
                    <div class="dropdown-menu">
                         <a class="dropdown-item" href="{{url('admin/laporan-aset')}}/{{date('Y') }}">Semua Bidang</a>
                        @foreach($list_bidang as $item)
                         <a class="dropdown-item" href="{{url('admin/laporan-aset')}}/{{date('Y') }}/{{$item->bidang_id}}">{{ucwords($item->bidang_nama)}}</a>
                         @endforeach
                    </div>
                  </div>

                  <center>
                    <h1>LAPORAN SEMUA ASET TAHUN {{$tahun_link}} <br>
                        {{$bidang->bidang_nama ?? ''}}
                    </h1>
                  </center>

                  <div class="col-md-12">
                      <a href="{{url('admin/laporan-aset',$tahun_link)}}/cetak" class="btn btn-dark float-right mb-2" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                  </div>
                  <table class="table table-bordered mt-3">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th>No</th>
                            <th>Aset</th>
                            <th>Jumlah</th>
                            <th>Kategori</th>
                            <th>Pemegang Aset</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($list_aset as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->aset_nama}}</td>
                            <td>{{$item->aset_qty}} Unit</td>
                            <td>{{ucwords($item->kategori->kategori_nama)}}</td>
                            <td>
                               <table class="table  table-borderless">
                                @foreach(App\Models\AsetUnit::where('aset_id',$item->aset_detail_id)->get() as $unit)
                                <tr>
                                    <td>{{ucwords($unit->unit_pemegang)}}</td>
                                    <td>
                                        @if($unit->unit_keadaan == 0)
                                        <span class="badge badge-danger">Rusak</span>
                                        @elseif($unit->unit_keadaan == 1)
                                        <span class="badge badge-warning">Hilang</span>
                                        @elseif($unit->unit_keadaan == 2)
                                        <span class="badge badge-success">Baik</span>
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
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data for bar chart
    const barData = {
        labels: [2014, 2015, 2016, 2017, 2018, 2019],
        datasets: [{
            label: 'Jumlah Aset',
            data: [150, 200, 250, 300, 350, 400], // Angka random
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    // Options for bar chart
    const barOptions = {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    // Create bar chart
    const barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: barData,
        options: barOptions
    });

    // Data for donut chart
    const donutData = {
        labels: ['Baik', 'Rusak', 'Hilang'],
        datasets: [{
            data: [100, 50, 25], // Angka random
            backgroundColor: [
                'rgba(75, 192, 192, 0.5)',
                'rgba(255, 99, 132, 0.5)',
                'rgba(255, 205, 86, 0.5)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 205, 86, 1)'
            ],
            borderWidth: 1
        }]
    };

    // Options for donut chart
    const donutOptions = {
        cutout: '50%',
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const label = context.label || '';
                        const value = context.raw;
                        return `${label}: ${value}`;
                    }
                }
            }
        }
    };

    // Create donut chart
    const donutCtx = document.getElementById('donutChart').getContext('2d');
    new Chart(donutCtx, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
    });
</script>

@endsection