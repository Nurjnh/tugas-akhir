@extends('template.base')
@section('content')
<div class="card">
	<div class="card-body">
		<h1>{{ucwords($detail->aset_nama)}}</h1>
		<p><b>Jenis Aset :</b> {{ucwords($detail->kategori->kategori_nama)}}</p>
	</div>
</div>

<div class="row mt-3">
	<div class="col-md-4">
		<img src="{{asset('system/public/app')}}/{{$detail->aset_foto}}" width="100%" alt="">
	</div>

	<div class="col-md-8">
		<div class="card">
			<div class="card-body">
				<table class="table table-borderless">
					<tr>
						<th>Nama Aset</th>
						<td>: {{ucwords($detail->aset_nama)}}</td>
					</tr>

					<tr>
						<th>Jenis Aset</th>
						<td>: {{ucwords($detail->kategori->kategori_nama)}}</td>
					</tr>

					<tr>
						<th>Jumlah Unit Aset</th>
						<td>: {{ucwords($detail->aset_qty)}} Unit</td>
					</tr>


					<tr>
						<th>Harga per Unit</th>
						<td>: Rp. {{number_format($detail->aset_harga)}}/Unit</td>
					</tr>

					<tr>
						<th>Tanggal Aset Masuk</th>
						<td>: {{Carbon\Carbon::parse($detail->aset_tanggal_masuk)->format('D d M Y')}}</td>
					</tr>
					<tr>
						<td colspan="2">
							<button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#detail" aria-expanded="false" aria-controls="collapseExample">
								<i class="fa fa-file"></i> Detail 
							</button>


						</td>
					</tr>
				</table>

					<!-- detail -->
				<div class="collapse mt-5" id="detail">
					<table class="table">
						<thead>
							<tr>
								<th width="30%">No Surat Pengada</th>
								<td>: {{$detail->aset->no_surat_pengada}}</td>
							</tr>

							<tr>
								<th width="30%">Tanggal Surat Pengada</th>
								<td>: {{$detail->aset->tanggal_surat_pengada}}</td>
							</tr>

							<tr>
								<th width="30%">Nama Pejabat Pengada</th>
								<td>: {{$detail->aset->nama_pejabat_pengada}}</td>
							</tr>

							<tr>
								<th width="30%">NIP Pejabat Pengada</th>
								<td>: {{$detail->aset->nip_pejabat_pengada}}</td>
							</tr>

							<tr>
								<th width="30%">Jabatan Pejabat Pengada</th>
								<td>: {{$detail->aset->jabatan_pejabat_pengada}}</td>
							</tr>

							<tr>
								<th width="30%">Nama Perusahaan</th>
								<td>: {{$detail->aset->nama_perusahaan}}</td>
							</tr>

							<tr>
								<th width="30%">Nama Vendor</th>
								<td>: {{$detail->aset->nama_vendor}}</td>
							</tr>

							<tr>
								<th width="30%">Jabatan Vendor</th>
								<td>: {{$detail->aset->jabatan_vendor}}</td>
							</tr>

							<tr>
								<th width="30%">No Notaris</th>
								<td>: {{$detail->aset->akta_notaris_nomor}}</td>
							</tr>
						</thead>
					</table>

				</div>

				<center>
					<h1 class="mt-5">Unit Aset</h1>
				</center>
				<button class="btn btn-warning float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
					<i class="fa fa-edit"></i> Edit
				</button>
				<table class="table table-hover table-bordered">
					<thead>
						<tr class="bg-dark text-white">
							<th>No</th>
							<th>Nama Pemegang</th>
							<th>Bidang</th>
							<th>Keadaan</th>
							<th>Nomor Aset</th>
						</tr>
					</thead>
					<tbody>
						@foreach($list_unit as $item)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{ucwords($item->unit_pemegang)}}</td>
							<td>{{$item->bidang->bidang_nama}}</td>
							<td class="text-center">
								@if($item->unit_keadaan == 0)
								<b class="text-danger">Rusak</b>
								@elseif($item->unit_keadaan == 1)
								<b class="text-warning">Hilang</b>
								@else
								<b class="text-success">Baik</b>
								@endif
							</td>
							<td>{{$item->unit_kode}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>


				<div class="collapse mt-5" id="collapseExample">
					<form action="{{ url('x/aset',$detail->aset_detail_id) }}/update-pemegang" method="POST" aria-multiline="true">

						@csrf
						@method("PUT")

						@foreach($list_unit as $item)
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<span>Pemegang/Lokasi Aset</span>
									<input type="text" class="form-control"  required name="unit_pemegang[]" value="{{$item->unit_pemegang}}" minlength="5">
									<input type="hidden" class="form-control"  name="aset_unit_id[]" value="{{$item->aset_unit_id}}">
									<input type="hidden" class="form-control"  name="bidang_id" value="{{$detail->aset_bidang_id}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<span>Keadaan Aset</span>
									<select name="unit_keadaan[]" id="" class="form-control">
										<option value="2" @if($item->unit_keadaan == 2) selected @endif>Baik</option>
										<option value="1" @if($item->unit_keadaan == 1) selected @endif>Hilang</option>
										<option value="0" @if($item->unit_keadaan == 0) selected @endif>Rusak</option>
									</select>
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<span> Nomor Aset</span>
									<input type="text" class="form-control" name="unit_kode[]" value="{{$item->unit_kode}}">
								</div>
							</div>
						</div> 
						@endforeach
						<button class="btn btn-primary btn-block mt-3"><i class="fa fa-save"></i> Update Info Aset</button>
					</form>

				</div>


			
			</div>
		</div>
	</div>


	<div class="col-md-12 mt-3">
		<div class="card">
			<div class="card-body">


				@if($countUnit == 0)
				<center>
					<h1>PEMEGANG DAN KEADAAN ASET</h1>
				</center>
				<form action="{{url('x/aset',$detail->aset_detail_id)}}/create-pemegang" method="POST" class="mt-5">
					@csrf
					@foreach($jumlah as $index => $value)
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<span>Pemegang/Lokasi Aset</span>
								<input type="text" class="form-control" required  name="unit_pemegang[]" value="{{ old('fields.' . $index) }}">
								<input type="hidden" class="form-control"  name="bidang_id" value="{{$detail->aset_bidang_id}}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<span>Keadaan Aset</span>
								<select name="unit_keadaan[]" id="" class="form-control">
									<option value="2">Baik</option>
									<option value="1">Hilang</option>
									<option value="0">Rusak</option>
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<span> Nomor Seri/Kode Unik</span>
								<input type="text" required class="form-control" name="unit_kode[]">
							</div>
						</div>
					</div>
					@endforeach

					<button class="btn btn-primary btn-block mt-3">Buat Pemegang Aset</button>
				</div>
			</div>
		</form>


		@endif



	</div>
</div>

@endsection