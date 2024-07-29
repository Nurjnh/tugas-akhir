<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>
		SIMONAS DISDIK
	</title>
	<!-- Favicon -->
	<link href="{{url('public/assets/img/icons/ktp.png')}}" rel="icon" type="image/png">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- Icons -->
	<link href="{{url('public')}}/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
	<link href="{{url('public')}}/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
	<!-- CSS Files -->
	<link href="{{url('public')}}/assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
</head>
<body>
	<style>
		@media print {
			@page {
				size: landscape;
			}
		}
	</style>
	<table class="table table-borderless mt-3">
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
					<table style="border:none;">
						@foreach(App\Models\AsetUnit::where('aset_id',$item->aset_detail_id)->get() as $unit)
						<tr>
							<td>{{$unit->unit_pemegang}}</td>
							<td>
								@if($unit->unit_keadaan == 0)
								Rusak
								@elseif($unit->unit_keadaan == 1)
								Hilang
								@elseif($unit->unit_keadaan == 2)
								Baik
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

	<script>
		window.print();
	</script>
</body>
</html>