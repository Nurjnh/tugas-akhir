@extends('template.base')
@section('content')

<div class="card">
	<div class="card-body">
		<center>
			<h1>DATA ASET DINAS PENDIDIKAN</h1>
		</center>
	</div>
</div>

<div class="card mt-3">
	<div class="card-body">
		<a href="{{url('admin/aset/create')}}" class="btn float-right btn-primary mb-3"><i class="fa fa-plus"></i> Buat Data Aset</a>

		<div class="table-reponsive mt-3">
			<table class="table" id="dataTable">
				<thead>
					<tr class="bg-primary text-white">
						<th class="text-center">No</th>
						<th class="text-center">Aksi</th>
						<th>Nama Aset</th>
						<th>Kategori Aset</th>
						<th>Jumlah Unit</th>
						<th>Pejabat Pengada</th>
						<th>Aset Masuk</th>
					</tr>
				</thead>
				<tbody>
					@foreach($list_barang as $item)
					<tr>
						<td class="text-center">{{$loop->iteration}}</td>
						<td class="text-center">
							<div class="btn-group">
								<a href="{{url('admin/aset',$item->aset_detail_id)}}/detail" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
								<a href="{{url('admin/aset',$item->aset_id)}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
								<!-- <a href="{{url('admin/aset',$item->aset_detail_id)}}/delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> -->
							</div>
						</td>
						<td>{{ucwords($item->aset_nama)}}</td>
						<td>{{ucwords($item->kategori->kategori_nama)}}</td>
						<td>{{$item->aset_qty}} Unit</td>
						<td>
							{{ucwords($item->aset->nama_pejabat_pengada)}} <br>
							NIP. {{ucwords($item->aset->nip_pejabat_pengada)}} <br>
						</td>
						<td>{{ucwords($item->aset_tanggal_masuk)}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection