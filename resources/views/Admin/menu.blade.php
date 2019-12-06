@extends('Admin.layouts.app')
@section('title', 'MENU | DISNAKER INDRAMAYU')
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
                        <td><a href="#"><i class="fa fa-trash"></i></a>  <a href="#"><i class="fa fa-edit"></i></a>  <a href="#"><i class="fa fa-check-circle"></i></a></td>
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