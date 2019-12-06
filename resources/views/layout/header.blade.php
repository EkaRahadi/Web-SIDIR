<?php use \App\Console\Helper; ?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Dinas Ketenagakerjaan Kabupaten Indramayu</title>

    <!-- Favicon -->
    <link rel="icon" href="{{url('/assets/images/nav.png')}}">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{url('/assets/style.css')}}">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
    <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Logo -->
                            <div class="logo">
                            <a href="#"><img src="{{url('/assets/images/logo-putih.png')}}" alt="" width="450px"></a>
                            </div>

                            <!-- Login Search Area -->
                            <div class="login-search-area d-flex align-items-center">
                               
                                <!-- Search Form -->
                                <div class="search-form">
                                    <form action="#" method="post">
                                        <input type="search" name="search" class="form-control" placeholder="Search">
                                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="newspaper-main-menu" id="stickyMenu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="newspaperNav">

                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="{{url('/assets/images/logo-putih.png')}}" alt=""></a>
                        </div>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                {!! Helper::main_menu() !!}
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- ##### Hero Area Start ##### -->
   <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <center>
  <ol class="carousel-indicators">
	@foreach(Helper::slider() as $key=>$item)
		<li data-target="#myCarousel" data-slide-to="{{$key}}" @if($key==0) class="active" @endif></li>
	@endforeach
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
  @foreach(Helper::slider() as $key=>$item)
    <div class="item @if($key==0) active @endif">
      <img src="{{url('/assets/images/slider/'.$item->foto)}}" alt="{{$item->alt}}" height="30px">
    </div>
  @endforeach
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Sebelmunya</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Selanjutnya</span>
  </a>
</div></center>
    <div class="hero-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-8 col-lg-8">
                    <!-- Breaking News Widget -->
                    <div class="breaking-news-area d-flex align-items-center">
                        <div class="news-title">
                            <p>Berita Terbaru</p>
                        </div>
                        <div id="breakingNewsTicker" class="ticker">
                            <ul>
							@foreach(Helper::berita_terbaru() as $item)
                                <li><a href="\berita\{{$item->judul_seo}}\baca">{{$item->judul_berita}}</a></li>
							@endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Hero Add -->
                <div class="col-12 col-lg-4">
                    <div class="hero-add">
                        <a href="#"><img src="{{url('assets/images/'.Helper::foto_samping()->foto)}}" width="400px" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->
