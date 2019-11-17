<?php
    function main_menu(){
        $menu = App\Menu::where('status', 'a')
            ->orderBy('urutan')
            ->get();
        $menus = array('items'=>array(), 'parents'=>array());
        foreach($menu as $item){
            $menus['items'] [$item->id_menu] = $item;
            $menus['parents'] [$item->parent][] = $item->id_menu;
        }
        if($menus){return build_menu(0, $menus); }
        return FALSE;
    }
    function build_menu($p, $menus){
        $html = "";
        if(isset($menus['parents'][$p])){
            if($p == 0){
                $html .= "<ul>";
            }else{
                $html .= "<ul class='dropdown'>";
            }

            foreach($menus['parents'][$p]  as $id_item){
                if(!isset($menus['parents'][$id_item])){
                    if(preg_match("/^http/", $menus['items'][$id_item]->link)){
                        $html .= "<li><a target='_BLANK' href='".$menus['items'][$id_item]->link."'>".$menus['items'][$id_item]->nama_menu."</a></li>";
                    }else{
                        $html .= "<li><a href='".$menus['items'][$id_item]->link."'>".$menus['items'][$id_item]->nama_menu."</a></li>";
                    }
                }
                if(isset($menus['parents'][$id_item])){
                    if(preg_match("/^http/", $menus['items'][$id_item]->link)){
                        $html .= "<li><a target='_BLANK' href='".$menus['items'][$id_item]->link."'>".$menus['items'][$id_item]->nama_menu."</a>";
                    }else{
                        $html .= "<li><a href='".$menus['items'][$id_item]->link."'>".$menus['items'][$id_item]->nama_menu."</a>";
                    }

                    $html .= build_menu($id_item, $menus);
                    $html .= "</li>";
                }
            }
            $html .= "</ul>";
        }
        return $html;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Dinas Tenaga Kerja Kabupaten Indramayu</title>

    <!-- Favicon -->
    <link rel="icon" href="http://disnaker.indramayukab.go.id/wp-content/uploads/2017/10/cropped-LOGO-INDRAMAYU-192x192.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="assets/style.css">

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
                            <a href="#"><img src="assets/images/core-img/logo.png" alt="" width="450px"></a>
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
                            <a href="index.html"><img src="assets/images/core-img/logo.png" alt=""></a>
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
                                {!! main_menu() !!}
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
