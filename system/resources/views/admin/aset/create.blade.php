@extends('template.base')
@section('content')

<div class="card">
	<div class="card-body">
		<center>
			<h1>FORM DATA ASET</h1>
		</center>

			<form action="{{url('admin/aset/create')}}" method="post" enctype="multipart/form-data">
				@csrf
		<div class="row">

				<div class="col-md-12 mt-3">
					<h3>1. Surat Perintah Kerja</h3>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<span>No Surat Pengada</span>
						<input type="text" required name="no_surat_pengada" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<span>Tanggal Surat Pengada</span>
						<input type="date" required name="tanggal_surat_pengada" class="form-control">
					</div>
				</div>


				<!-- NAMA PEJABAT PENGADA -->
				<div class="col-md-12 mt-3">
					<h3>2. Data Pejabat Pengada</h3>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<span>Nama Pejabat Pengada</span>
						<input type="text" required name="nama_pejabat_pengada" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<span>Nip Pejabat Pengada</span>
						<input type="number" required name="nip_pejabat_pengada" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<span>Jabatan Pejabat Pengada</span>
						<input type="text" required name="jabatan_pejabat_pengada" class="form-control">
					</div>
				</div>

				<div class="col-md-6"></div>


				<div class="col-md-12 mt-3">
					<h3>3. Data Vendor</h3>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<span>Nama Perusahaan/PT/CV</span>
						<input type="text" required name="nama_perusahaan" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<span>Nama Vendor</span>
						<input type="text" required name="nama_vendor" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<span>Jabatan Vendor</span>
						<input type="text" required name="jabatan_vendor" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<span>Akta Notaris Vendor</span>
						<input type="text" required name="akta_notaris_nomor" class="form-control">
					</div>
				</div>


				<div class="col-md-12 mt-3">
					<h3>4. Data Aset</h3>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<span>Jenis Aset</span>
						<select name="aset_kategori_id[]" required id="" class="form-control">
							<option value="" hidden> -- Pilih Jenis Aset --</option>
							@foreach($kategori_aset as $kategori)
							<option value="{{$kategori->kategori_id}}">{{ucwords($kategori->kategori_nama)}}</option>
							@endforeach
						</select>
					</div>
				</div>


				<div class="col-md-6">
					<div class="form-group">
						<span>Nama Barang/Aset</span>
						<input type="text" required name="aset_nama[]" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<span>Jumlah Aset</span>
						<input type="number" required name="aset_qty[]" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<span>Harga satuan aset</span>
						<input type="number" required name="aset_harga[]" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<span>Tanggal diterima aset</span>
						<input type="date" required name="aset_tanggal_masuk[]" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<span>Bidang Pemegang Aset</span>
					<select name="aset_bidang_id[]" id="" class="form-control" required>
						<option value="" hidden>--Pilih Bidang--</option>
						@foreach($list_bidang as $bidang)
						<option value="{{$bidang->bidang_id}}">{{ucwords($bidang->bidang_nama)}}</option>
						@endforeach
					</select>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<span>Gambar Aset</span>
						<input type="file" required name="aset_foto[]" accept="image/*" class="form-control">
					</div>
				</div>

				<div class="col-md-12">
					<div id="dynamicTableUntuk">

					</div>
					<button type="button" name="add" id="add_untuk"
					class="btn btn-sm btn-dark mb-3"><i class="fa fa-plus"></i> Tambah Barang</button>
				</div>

				<div class="col-md-12">
					<button class="btn btn-primary float-right">Simpan</button>
				</div>


		</div>
			</form>
	</div>
</div>



<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


<script type="text/javascript">
	var u = 0;

	$("#add_untuk").click(function() {

		++u;

		var isi_dasar = `

		<div class="row mt-5">
		<div class="col-md-6">
		<div class="form-group">
		<span>Jenis Aset</span>
		<select name="aset_kategori_id[]" required id="" class="form-control">
		<option value="" hidden> -- Pilih Jenis Aset --</option>
		@foreach($kategori_aset as $kategori)
							<option value="{{$kategori->kategori_id}}">{{ucwords($kategori->kategori_nama)}}</option>
							@endforeach
		</select>
		</div>
		</div>


		<div class="col-md-6">
		<div class="form-group">
		<span>Nama Barang/Aset</span>
		<input type="text" required name="aset_nama[]" class="form-control">
		</div>
		</div>

		<div class="col-md-6">
		<div class="form-group">
		<span>Jumlah Aset</span>
		<input type="number" required name="aset_qty[]" class="form-control">
		</div>
		</div>

		<div class="col-md-6">
		<div class="form-group">
		<span>Harga satuan aset</span>
		<input type="number" required name="aset_harga[]" class="form-control">
		</div>
		</div>

		<div class="col-md-6">
		<div class="form-group">
		<span>Tanggal diterima aset</span>
		<input type="date" required name="aset_tanggal_masuk[]" class="form-control">
		</div>
		</div>

		<div class="col-md-6">
					<div class="form-group">
						<span>Bidang Pemegang Aset</span>
					<select name="aset_bidang_id[]" id="" class="form-control" required>
						<option value="" hidden>--Pilih Bidang--</option>
						@foreach($list_bidang as $bidang)
						<option value="{{$bidang->bidang_id}}">{{ucwords($bidang->bidang_nama)}}</option>
						@endforeach
					</select>
					</div>
				</div>

		<div class="col-md-6">
		<div class="form-group">
		<span>Gambar Aset</span>
		<input type="file" required name="aset_foto[]" accept="image/*" class="form-control">
		</div>
		</div>

		<div class="col-md-12">
		<button class="remove-tr-untuk btn btn-danger float-right btn-sm"><i class="fa fa-trash"></i> Hapus</button>
		</div>
		</div>

		`;

		$("#dynamicTableUntuk").append(isi_dasar);

	});

	$(document).on('click', '.remove-tr-untuk', function() {
		$(this).closest('.row').remove();
	});
</script>

@endsection