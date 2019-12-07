@extends('Admin.layouts.app')
@section('title', 'HALAMAN | DISNAKER INDRAMAYU')
@section('content')
					@if ($message = Session::get('info'))
						<div class="alert alert-info" data-dismiss="alert">
							<strong>Info :</strong> {{ $message }}
						</div>
					@endif
					@if ($message = Session::get('error'))
						<div class="alert alert-danger" data-dismiss="alert">
							<strong>Error :</strong> {{ $message }}
						</div>
					@endif
<div class="animated fadeIn">
<div class="card">
        <div class="card-header">  
		<h3>Berita</h3>
            <p align="right">
             <a href="{{route('tambah_berita')}}" class="btn btn-primary">Tambah Berita</a>
                    </p>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Dipuplikasikan Oleh</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
					@foreach($berita as $key=>$item)
					<tr>
						<td>{{++$key}}</td>
						<td><img src="{!! asset('assets/images/berita/'.$item->foto) !!}" width="100px"></td>
						<td>{{$item->judul_berita}}</td>
						<td>{{$item->kategori->kategori}}</td>
						<td>{{$item->post->nama}}</td>
						<td><a href="#"><i class="fa fa-trash"></i></a>  <a href="#"><i class="fa fa-edit"></i></a>  <a href="#"><i class="fa fa-check-circle"></i></a></td>
					</tr>
					@endforeach
                </tbody>
            </table>
        </div>
    </div> 

	<div class="card">
        <div class="card-header"> 
			<h3>Kategori Berita</h3>
            <p align="right">
             <a href="{{route('tambah_berita')}}" class="btn btn-primary">Tambah Kategori Berita</a>
                    </p>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table1" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
					@foreach($KategoriBerita as $key=>$item)
					<tr>
						<td>{{++$key}}</td>
						<td>{{$item->kategori}}</td>
						<td><a href="#"><i class="fa fa-trash"></i></a>  <a href="#"><i class="fa fa-edit"></i></a></td>
					</tr>
					@endforeach
                </tbody>
            </table>
        </div>
    </div> 
</div>
 <!-- Scripts -->
 <script src="{!! asset('assets/assets/js/lib/data-table/datatables.min.js') !!}"></script>
    <script src="{!! asset('assets/assets/js/lib/data-table/dataTables.bootstrap.min.js') !!}"></script>
    <script src="{!! asset('assets/assets/js/lib/data-table/dataTables.buttons.min.js') !!}"></script>
    <script src="{!! asset('assets/assets/js/lib/data-table/buttons.bootstrap.min.js') !!}"></script>
    <script src="{!! asset('assets/assets/js/lib/data-table/jszip.min.js') !!}"></script>
    <script src="{!! asset('assets/assets/js/lib/data-table/vfs_fonts.js') !!}"></script>
    <script src="{!! asset('assets/assets/js/lib/data-table/buttons.html5.min.js') !!}"></script>
    <script src="{!! asset('assets/assets/js/lib/data-table/buttons.print.min.js') !!}"></script>
    <script src="{!! asset('assets/assets/js/lib/data-table/buttons.colVis.min.js') !!}"></script>
    <script src="{!! asset('/assets/assets/js/init/datatables-init.js') !!}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table1').DataTable();
      } );
  </script>
@endsection