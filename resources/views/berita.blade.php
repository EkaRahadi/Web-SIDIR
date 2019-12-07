@include('layout.header')
    <!-- ##### Featured Post Area Start ##### -->
    <div class="featured-post-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="row">
                    @foreach($news as $key=>$item)
                        @if($key == 0)
                        <!-- Single Featured Post -->
                        <div class="col-12 col-lg-7">
                            <div class="single-blog-post featured-post">
                                <div class="post-thumb">
                                    <a href="\berita\{{$item->judul_seo}}\baca"><img src="{!! asset('assets/images/berita/'.$item->foto) !!}" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-catagory">{{$item->kategori->kategori}}</a>
                                    <a href="\berita\{{$item->judul_seo}}\baca" class="post-title">
                                        <h6>{{$item->judul_berita}}</h6>
                                    </a>
                                    <div class="post-meta">
                                        <p class="post-author">By <a href="#">{{$item->post->nama}}</a></p>
                                        <p class="post-excerp">
                                        {!! substr($item->isi_berita, 0, 300) !!}.... <a href="\berita\{{$item->judul_seo}}\baca">Selanjutnya</a>
                                        </p>
                                        <!-- Post Like & Post Comment -->
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="post-like"><img src="assets/images/core-img/like.png" alt=""> <span>392</span></a>
                                            <a href="#" class="post-comment"><img src="assets/images/core-img/chat.png" alt=""> <span>10</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @if(count($news) > 1)
                        <div class="col-12 col-lg-5"> 
                        @foreach($news as $key=>$item)
                        @if($key > 0)
                            <!-- Single Featured Post -->
                            <div class="single-blog-post featured-post-2">
                                <div class="post-thumb">
                                    <a href="\berita\{{$item->judul_seo}}\baca"><img src="{!! asset('assets/images/berita/'.$item->foto) !!}" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-catagory">{{$item->kategori->kategori}}</a>
                                    <div class="post-meta">
                                        <a href="\berita\{{$item->judul_seo}}\baca" class="post-title">
                                            <h6>{{$item->judul_berita}}</h6>
                                        </a>
                                        <!-- Post Like & Post Comment -->
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="post-like"><img src="assets/images/core-img/like.png" alt=""> <span>392</span></a>
                                            <a href="#" class="post-comment"><img src="assets/images/core-img/chat.png" alt=""> <span>10</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endif
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Single Featured Post -->
					@foreach($news_by_kategori as $item)
                    <div class="single-blog-post small-featured-post d-flex">
                        <div class="post-thumb">
                            <a href="\berita\{{$item->judul_seo}}\baca"><img src="{!! asset('assets/images/berita/'.$item->foto) !!}" alt=""></a>
                        </div>
                        <div class="post-data">
                            <a href="#" class="post-catagory">{{$item->kategori->kategori}}</a>
                            <div class="post-meta">
                                <a href="\berita\{{$item->judul_seo}}\baca" class="post-title">
                                    <h6>{{$item->judul_berita}}</h6>
                                </a>
                                <p class="post-date"><span>{{$item->getPublishedAtAttribute($item->created_at)}}</span></p>
                            </div>
                        </div>
                    </div>
					@endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Featured Post Area End ##### -->

    <!-- ##### Popular News Area Start ##### -->
    <div class="popular-news-area section-padding-80-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="section-heading">
                        <h6>Popular News</h6>
                    </div>

                    <div class="row">

                        <!-- Single Post -->
                        <div class="col-12 col-md-6">
                            <div class="single-blog-post style-3">
                                <div class="post-thumb">
                                    <a href="#"><img src="assets/images/bg-img/12.jpg" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-catagory">Finance</a>
                                    <a href="#" class="post-title">
                                        <h6>Dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                                    </a>
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="#" class="post-like"><img src="assets/images/core-img/like.png" alt=""> <span>392</span></a>
                                        <a href="#" class="post-comment"><img src="assets/images/core-img/chat.png" alt=""> <span>10</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Post -->
                        <div class="col-12 col-md-6">
                            <div class="single-blog-post style-3">
                                <div class="post-thumb">
                                    <a href="#"><img src="assets/images/bg-img/13.jpg" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-catagory">Finance</a>
                                    <a href="#" class="post-title">
                                        <h6>Dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                                    </a>
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="#" class="post-like"><img src="assets/images/core-img/like.png" alt=""> <span>392</span></a>
                                        <a href="#" class="post-comment"><img src="assets/images/core-img/chat.png" alt=""> <span>10</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Post -->
                        <div class="col-12 col-md-6">
                            <div class="single-blog-post style-3">
                                <div class="post-thumb">
                                    <a href="#"><img src="assets/images/bg-img/14.jpg" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-catagory">Finance</a>
                                    <a href="#" class="post-title">
                                        <h6>Dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                                    </a>
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="#" class="post-like"><img src="assets/images/core-img/like.png" alt=""> <span>392</span></a>
                                        <a href="#" class="post-comment"><img src="assets/images/core-img/chat.png" alt=""> <span>10</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Post -->
                        <div class="col-12 col-md-6">
                            <div class="single-blog-post style-3">
                                <div class="post-thumb">
                                    <a href="#"><img src="assets/images/bg-img/15.jpg" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-catagory">Finance</a>
                                    <a href="#" class="post-title">
                                        <h6>Dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                                    </a>
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="#" class="post-like"><img src="assets/images/core-img/like.png" alt=""> <span>392</span></a>
                                        <a href="#" class="post-comment"><img src="assets/images/core-img/chat.png" alt=""> <span>10</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="section-heading">
                        <h6>Info</h6>
                    </div>
                    <!-- Popular News Widget -->
                    <div class="popular-news-widget mb-30">
                        <h3>4 Most Popular News</h3>

                        <!-- Single Popular Blog -->
                        <div class="single-popular-post">
                            <a href="#">
                                <h6><span>1.</span> Amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales.</h6>
                            </a>
                            <p>April 14, 2018</p>
                        </div>

                        <!-- Single Popular Blog -->
                        <div class="single-popular-post">
                            <a href="#">
                                <h6><span>2.</span> Consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer.</h6>
                            </a>
                            <p>April 14, 2018</p>
                        </div>

                        <!-- Single Popular Blog -->
                        <div class="single-popular-post">
                            <a href="#">
                                <h6><span>3.</span> Adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo.</h6>
                            </a>
                            <p>April 14, 2018</p>
                        </div>

                        <!-- Single Popular Blog -->
                        <div class="single-popular-post">
                            <a href="#">
                                <h6><span>4.</span> Eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                            </a>
                            <p>April 14, 2018</p>
                        </div>
                    </div>

                    <!-- Newsletter Widget -->
                    <div class="newsletter-widget">
                        <h4>Newsletter</h4>
                        <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                        <form action="#" method="post">
                            <input type="text" name="text" placeholder="Name">
                            <input type="email" name="email" placeholder="Email">
                            <button type="submit" class="btn w-100">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Popular News Area End ##### -->

    <!-- ##### Video Post Area Start ##### -->
    <div class="video-post-area bg-img bg-overlay" style="background-image: url(img/bg-img/bg1.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Video Post -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single-video-post">
                        <img src="assets/images/bg-img/video1.jpg" alt="">
                        <!-- Video Button -->
                        <div class="videobtn">
                            <a href="https://www.youtube.com/watch?v=5BQr-j3BBzU" class="videoPlayer"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Video Post -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single-video-post">
                        <img src="assets/images/bg-img/video2.jpg" alt="">
                        <!-- Video Button -->
                        <div class="videobtn">
                            <a href="https://www.youtube.com/watch?v=5BQr-j3BBzU" class="videoPlayer"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Video Post -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single-video-post">
                        <img src="assets/images/bg-img/video3.jpg" alt="">
                        <!-- Video Button -->
                        <div class="videobtn">
                            <a href="https://www.youtube.com/watch?v=5BQr-j3BBzU" class="videoPlayer"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Video Post Area End ##### -->

    <!-- ##### Editorial Post Area Start ##### -->
    <div class="editors-pick-post-area section-padding-80-50">
        <div class="container">
            <div class="row">
                <!-- Editors Pick -->
                <div class="col-12 col-md-7 col-lg-9">
                    <div class="section-heading">
                        <h6>Jurnalis</h6>
                    </div>

                    <div class="row">

                        <!-- Single Post -->
                        <div class="col-12 col-lg-4">
                            <div class="single-blog-post">
                                <div class="post-thumb">
                                    <a href="#"><img src="assets/images/bg-img/1.jpg" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-title">
                                        <h6>Orci varius natoque penatibus et magnis dis parturient montes.</h6>
                                    </a>
                                    <div class="post-meta">
                                        <div class="post-date"><a href="#">February 11, 2018</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Post -->
                        <div class="col-12 col-lg-4">
                            <div class="single-blog-post">
                                <div class="post-thumb">
                                    <a href="#"><img src="assets/images/bg-img/2.jpg" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-title">
                                        <h6>Orci varius natoque penatibus et magnis dis parturient montes.</h6>
                                    </a>
                                    <div class="post-meta">
                                        <div class="post-date"><a href="#">February 11, 2018</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Post -->
                        <div class="col-12 col-lg-4">
                            <div class="single-blog-post">
                                <div class="post-thumb">
                                    <a href="#"><img src="assets/images/bg-img/3.jpg" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-title">
                                        <h6>Orci varius natoque penatibus et magnis dis parturient montes.</h6>
                                    </a>
                                    <div class="post-meta">
                                        <div class="post-date"><a href="#">February 11, 2018</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Post -->
                        <div class="col-12 col-lg-4">
                            <div class="single-blog-post">
                                <div class="post-thumb">
                                    <a href="#"><img src="assets/images/bg-img/4.jpg" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-title">
                                        <h6>Orci varius natoque penatibus et magnis dis parturient montes.</h6>
                                    </a>
                                    <div class="post-meta">
                                        <div class="post-date"><a href="#">February 11, 2018</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Post -->
                        <div class="col-12 col-lg-4">
                            <div class="single-blog-post">
                                <div class="post-thumb">
                                    <a href="#"><img src="assets/images/bg-img/5.jpg" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-title">
                                        <h6>Orci varius natoque penatibus et magnis dis parturient montes.</h6>
                                    </a>
                                    <div class="post-meta">
                                        <div class="post-date"><a href="#">February 11, 2018</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Post -->
                        <div class="col-12 col-lg-4">
                            <div class="single-blog-post">
                                <div class="post-thumb">
                                    <a href="#"><img src="assets/images/bg-img/6.jpg" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-title">
                                        <h6>Orci varius natoque penatibus et magnis dis parturient montes.</h6>
                                    </a>
                                    <div class="post-meta">
                                        <div class="post-date"><a href="#">February 11, 2018</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- World News -->
                <div class="col-12 col-md-5 col-lg-3">
                    <div class="section-heading">
                        <h6>Berita Mancanegara</h6>
                    </div>

                    <!-- Single Post -->
                    <div class="single-blog-post style-2">
                        <div class="post-thumb">
                            <a href="#"><img src="assets/images/bg-img/7.jpg" alt=""></a>
                        </div>
                        <div class="post-data">
                            <a href="#" class="post-title">
                                <h6>Orci varius natoque penatibus et magnis</h6>
                            </a>
                            <div class="post-meta">
                                <div class="post-date"><a href="#">February 11, 2018</a></div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Post -->
                    <div class="single-blog-post style-2">
                        <div class="post-thumb">
                            <a href="#"><img src="assets/images/bg-img/8.jpg" alt=""></a>
                        </div>
                        <div class="post-data">
                            <a href="#" class="post-title">
                                <h6>Orci varius natoque penatibus et magnis</h6>
                            </a>
                            <div class="post-meta">
                                <div class="post-date"><a href="#">February 11, 2018</a></div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Post -->
                    <div class="single-blog-post style-2">
                        <div class="post-thumb">
                            <a href="#"><img src="assets/images/bg-img/9.jpg" alt=""></a>
                        </div>
                        <div class="post-data">
                            <a href="#" class="post-title">
                                <h6>Orci varius natoque penatibus et magnis</h6>
                            </a>
                            <div class="post-meta">
                                <div class="post-date"><a href="#">February 11, 2018</a></div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Post -->
                    <div class="single-blog-post style-2">
                        <div class="post-thumb">
                            <a href="#"><img src="assets/images/bg-img/10.jpg" alt=""></a>
                        </div>
                        <div class="post-data">
                            <a href="#" class="post-title">
                                <h6>Orci varius natoque penatibus et magnis</h6>
                            </a>
                            <div class="post-meta">
                                <div class="post-date"><a href="#">February 11, 2018</a></div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Post -->
                    <div class="single-blog-post style-2">
                        <div class="post-thumb">
                            <a href="#"><img src="assets/images/bg-img/11.jpg" alt=""></a>
                        </div>
                        <div class="post-data">
                            <a href="#" class="post-title">
                                <h6>Orci varius natoque penatibus et magnis</h6>
                            </a>
                            <div class="post-meta">
                                <div class="post-date"><a href="#">February 11, 2018</a></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ##### Editorial Post Area End ##### -->
	@include('layout.footer')