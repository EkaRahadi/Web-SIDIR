@extends('Admin.layouts.app')
@section('title', 'HALAMAN | DISNAKER INDRAMAYU')
@section('content')
<div class="animated fadeIn">
<div class="card">
        <div class="card-header">  
		<h3>Berita</h3>
            <p align="right">
             <a href="{{route('tambah_halaman')}}" class="btn btn-primary">Tambah Halaman</a>
                    </p>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>Link</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
				@foreach($pages as $key=>$i)
					<tr>
						<td>{{++$key}}</td>
						@if(trim($i->foto) == "")
							<td><img src="{!! asset('assets/images/berita/disnaker-no-images.png') !!}" width="100px"></td>
						@else
							<td><img src="{!! asset('assets/images/halaman/'.$i->foto) !!}" width="100px"></td>
						@endif
						<td>{{$i->judul_halaman}}</td>
						<td><i class="btn-link">/halaman/{{$i->judul_seo}}</i></td>
						<td>
							<button class="btn btn-link" onClick="fhal(3, {{$i->id}})" title="Hapus"><i class="fa fa-trash"></i></button>
							<a class="btn btn-link" href="{{route('edit_halaman', $i->id)}}" title="Edit Halaman"><i class="fa fa-edit"></i></a>
							@if($i->status=="YA") 
								<button type="button" class="btn btn-link" onClick="fhal(1, {{$i->id}})" title="Sembunyikan" ><i class="fa fa-check-circle"></i></button> 
							@else 
								<button type="button" class="btn btn-link" onClick="fhal(2, {{$i->id}})" title="Publikasikan" ><i class="fa fa-times"></i></button> 
							@endif
						</td>
					</tr>
				@endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
<script src="{!! asset('assets/assets/js/lib/data-table/datatables.min.js') !!}"></script>
@endsection