@extends('Admin.layouts.app')
@section('title', 'ADMINISTRATOR | DISNAKER INDRAMAYU')

@section('nav-head')
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row sm-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>{{$judul}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="/">Dashboard</a></li>
                                    {!! $sub !!}
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('content')
 <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{$user}}</span></div>
                                            <div class="stat-heading">Jumlah Pengguna</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-news-paper"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">{{$berita}}</span></div>
                                            <div class="stat-heading">Jumlah Berita</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-browser"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">0</span></div>
                                            <div class="stat-heading">Pelaporan Warga</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-lg-10">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Statistik Pengunjung</h4>
                                <canvas id="statistikChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            
</div>
<script src="{{url('assets/js/Chart.js')}}" type="text/javascript"></script>
<script>

		var ctx = document.getElementById("statistikChart").getContext('2d');
		var label_data = [@foreach($label_data_statistik as $r)"{{$r}}",@endforeach]
		var data = [@foreach($data_statistik as $r){{$r}},@endforeach]	
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: label_data,
				datasets: [{
					label: '# Pengunjung Disnaker',
					data: data,
					backgroundColor:'rgba(54, 162, 235, 0.2)',
					borderColor: 'rgba(54, 162, 235, 1)',
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
@endsection