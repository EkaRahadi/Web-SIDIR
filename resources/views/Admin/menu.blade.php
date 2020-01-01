@extends('Admin.layouts.app')
@section('title', 'MENU | DISNAKER INDRAMAYU')
@section('content')
<div class="animated fadeIn">
<div class="card">
        <div class="card-header">  
            <p align="right">
             <a href="{{route('tambah_menu')}}" class="btn btn-primary">Tambah Menu</a>
                    </p>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Level Menu</th>
                        <th>Link</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menu as $no=>$item)
                    <tr>
                        <td>{{++$no}}</td>
                        <td>{{$item->nama_menu}}</td>
                        <td>
                            @if($item->parent == 0)Menu Utama @else {{\App\Console\Helper::toParentName($item->parent)}} @endif
                        </td>
                        <td>{{$item->link}}</td>
                        <td>
							<button class="btn btn-link" onClick="f(3, {{$item->id_menu}})" title="Hapus"><i class="fa fa-trash"></i></button>
							<a class="btn btn-link" href="{{route('edit_menu', $item->id_menu)}}" title="Edit Menu"><i class="fa fa-edit"></i></a>
							@if($item->status=="a") 
								<button type="button" class="btn btn-link" onClick="f(1, {{$item->id_menu}})" title="Sembunyikan" ><i class="fa fa-check-circle"></i></button> 
							@else 
								<button type="button" class="btn btn-link" onClick="f(2, {{$item->id_menu}})" title="Tampilkan" ><i class="fa fa-times"></i></button> 
							@endif
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
          $('#bootstrap-data-table-export').DataTable();
      } );
	  
  </script>
@endsection