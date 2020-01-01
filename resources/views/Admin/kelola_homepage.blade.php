@extends('Admin.layouts.app')
@section('title', 'HALAMAN UTAMA | DISNAKER INDRAMAYU')
@section('content')
<div class="animated fadeIn">
<div class="card">
        <div class="card-header">
  
		<form action="/admin/proses_tambah_slider" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}
		<h3>Gambar Slider</h3><br>
        <div class="row form-group">
			<div class="col col-sm-3"><input type="file" id="file-input" name="foto" required> </div>
			<div class="col col-sm-4"><input type="text" name="alt" placeholder="Alt" class="form-control" required></div>
			<div class="col col-sm-4"><input type="submit" class="btn btn-primary" value="Tambah Slider"></div>
		</div>
		</form>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>alt</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
				@foreach($slider as $num=>$item)
					<tr>
						<td>{{++$num}}</td>
						<td><img src="/assets/images/slider/{{$item->foto}}" width="300px"></td>
						<td>{{$item->alt}}</td>
						<td><button onClick="hapus_slider('{{$item->id}}')"><i class="fa fa-trash"></i></button></td>
					<tr>
				@endforeach
                </tbody>
            </table>
        </div>
    </div> 
	<div class="card">
        <div class="card-header">
			<h3>Foto Samping</h3>
        </div>
        <div class="card-body">
		<form action="/admin/proses_ganti_foto_samping" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}
			<div class="row form-group">
				<div class="col col-sm-3">
					<input type="file" id="file-input" name="foto" required>
					<small class="help-block form-text" style="color:red; font-style:italic">Foto Saat Ini: {{$foto_samping}}</small>
				</div>
				<div class="col col-sm-4"><input type="submit" class="btn btn-primary" value="Ganti"></div>
			</div>
		</form>
        </div>
    </div> 
</div>
<script src="{!! asset('assets/assets/js/lib/data-table/datatables.min.js') !!}"></script>
@endsection