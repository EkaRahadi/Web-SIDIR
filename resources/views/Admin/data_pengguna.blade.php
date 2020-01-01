@extends('Admin.layouts.app')
@section('title', 'ADMINISTRATOR | DISNAKER INDRAMAYU')
@section('content')
<div class="animated fadeIn">
<div class="card">
        <div class="card-header">  
            <p align="right">
             <a href="/admin/pengguna/tambah" class="btn btn-primary">Tambah Pengguna</a>
                    </p>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nomor Identitas</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
				<tbody>
				@foreach($users as $key=>$user)
					<tr>
						<td>{{++$key}}</td>
						<td>
							@if($user->foto == null)
							<img class="img-thumbnail" src="{!! asset('assets/images/berita/disnaker-no-images.png') !!}" width="100px">
							@else
							<img class="img-thumbnail" src="{!! asset('assets/images/pengguna/'.$user->foto) !!}" width="100px">
							@endif
						</td>
						<td>{{$user->no_id}}</td>
						<td>{{$user->nama}}</td>
						<td>{{$user->username}}</td>
						<td>
							@if($user->level == 1)
							<button type="button" class="btn btn-link" title="Jadikan Jurnalis" onClick="pengguna(1,{{$user->id_pengguna}})"><i class="fa fa-user"></i></button>
							@else
							<button type="button" class="btn btn-link" title="Jadikan Admin" onClick="pengguna(2,{{$user->id_pengguna}})"><i class="fa fa-meh-o"></i></button>
							@endif
							<a href="{{route('okeoce', 'edit?id_pengguna='.$user->id_pengguna)}}" class="btn btn-link" title="Edit"><i class="fa fa-pencil"></i></a>
							<button type="button" class="btn btn-link" title="Hapus" onClick="pengguna(3,{{$user->id_pengguna}})"><i class="fa fa-trash"></i></button>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
        </div>
    </div>           
</div>
	<script src="{!! asset('assets/assets/js/lib/data-table/datatables.min.js') !!}"></script> <script src="{!! asset('assets/assets/js/lib/data-table/datatables.min.js') !!}"></script>
    <script src="{!! asset('assets/assets/js/lib/data-table/dataTables.bootstrap.min.js') !!}"></script>
    <script src="{!! asset('assets/assets/js/lib/data-table/dataTables.buttons.min.js') !!}"></script>
    <script src="{!! asset('assets/assets/js/lib/data-table/buttons.bootstrap.min.js') !!}"></script>
    <script src="{!! asset('assets/assets/js/lib/data-table/jszip.min.js') !!}"></script>
    <script src="{!! asset('assets/assets/js/lib/data-table/vfs_fonts.js') !!}"></script>
    <script src="{!! asset('assets/assets/js/lib/data-table/buttons.html5.min.js') !!}"></script>
    <script src="{!! asset('assets/assets/js/lib/data-table/buttons.print.min.js') !!}"></script>
    <script src="{!! asset('assets/assets/js/lib/data-table/buttons.colVis.min.js') !!}"></script>
    <script src="{!! asset('/assets/assets/js/init/datatables-init.js') !!}"></script>
@endsection