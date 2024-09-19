@extends('template.base')
@section('content')


<div class="card">
	<div class="card-body">
		<center>
			<h3>DATA JENIS ASET</h3>
		</center>

		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif

		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary mb-3 float-right" data-toggle="modal" data-target="#exampleModal">
			<i class="fa fa-plus"></i>	Buat Jenis Aset
		</button>


		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('admin/kategori-aset/create')}}" method="post">
							@csrf
							<div class="form-group">
								<span>Nama Jenis Aset</span>
								<input type="text" placeholder="Nama Jenis Aset" name="kategori_nama" class="form-control">
							</div>

							<button class="btn btn-sm btn-primary float-right"> <i class="fa fa-save"></i> Simpan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- end moda -->

		<div class="table-responsive">
			<table class="table table-bordered table-hover">
				<thead>
					<tr class="bg-primary text-white">
						<th>No</th>
						<th>Aksi</th>
						<th>Nama Jenis Aset</th>
					</tr>
				</thead>


				<tbody>
					@foreach($list_kategori as $item)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td><a href="{{url('admin/kategori-aset',$item->kategori_id)}}/delete" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a></td>
						<td>{{ucwords($item->kategori_nama)}}</td>
					</tr>
					@endforeach
				</tbody>

				<tfoot>
					<tr class="bg-primary text-white">
						<th>No</th>
						<th>Aksi</th>
						<th>Nama Jenis Aset</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>

@endsection