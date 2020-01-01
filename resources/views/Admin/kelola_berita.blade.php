@extends('Admin.layouts.app')
@section('title', 'BERITA | DISNAKER INDRAMAYU')
@section('content')					
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
                        <th>Diposting Oleh</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
					@foreach($berita as $key=>$item)
					<tr>
						<td>{{++$key}}</td>
						@if(trim($item->foto) == "")
							<td><img src="{!! asset('assets/images/berita/disnaker-no-images.png') !!}" width="100px"></td>
						@else
							<td><img src="{!! asset('assets/images/berita/'.$item->foto) !!}" width="100px"></td>
						@endif
						<td>{{$item->judul_berita}}</td>
						<td>{{$item->kategori->kategori}}</td>
						<td>{{$item->post->nama}}</td>
						@if($item->status == "YA")
						<td><i>Dipuplikasikan</i></td>
						@else
						<td><i>Disembunyikan</i></td>
						@endif
						<td>
						<button onClick="hapus('{{$item->id_berita}}')"><i class="fa fa-trash"></i></button>  
						<button onClick="edit_confirm('{{$item->id_berita}}')"><i class="fa fa-edit"></i></button>  
						@if($item->status == "YA")
						<button onClick="aktifasi_berita(0, '{{$item->id_berita}}')"><i class="fa fa-times"></i></a></td>
						@else
						<button onClick="aktifasi_berita(1, '{{$item->id_berita}}')"><i class="fa fa-check-circle"></i></a></td>
						@endif
					</tr>
					@endforeach
                </tbody>
            </table>
        </div>
    </div> 
					@if ($message = Session::get('info_kat'))
						<div class="alert alert-info" data-dismiss="alert">
							<strong>Info :</strong> {{ $message }}
						</div>
					@endif
	<div class="card">
        <div class="card-header"> 
			<h3>Kategori Berita</h3>
            <p align="right">
             <button onClick="tambah_kategori(0,'')" class="btn btn-primary">Tambah Kategori Berita</button>
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
						<td>
						<button type="button" onClick="kategori_berita('{{$item->id_kategori}}', false)"><i class="fa fa-trash"></i></button>  
						<button type="button" onClick="tambah_kategori({{$item->id_kategori}},'{{$item->kategori}}')"><i class="fa fa-edit"></i></button>
						</td>
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