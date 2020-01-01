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
								@if(trim($item->foto) == "")
                                    <a href="\berita\{{$item->judul_seo}}\baca"><img src="{!! asset('assets/images/berita/disnaker-no-images.png') !!}" alt=""></a>
                                @else
									<a href="\berita\{{$item->judul_seo}}\baca"><img src="{!! asset('assets/images/berita/'.$item->foto) !!}" alt=""></a>
                                @endif
								</div>
                                <div class="post-data">
                                    <a href="\berita\cari?typ=kategori&search={{$item->kategori->id_kategori}}" class="post-catagory">{{$item->kategori->kategori}}</a>
                                    <a href="\berita\{{$item->judul_seo}}\baca" class="post-title">
                                        <h6>{{$item->judul_berita}}</h6>
                                    </a>
                                    <div class="post-meta">
                                        <p class="post-author">By <a href="#">{{$item->post->nama}}</a></p>
                                        <p class="post-excerp">
                                        {{ strip_tags(substr($item->isi_berita, 0, 300)) }}.... <a href="\berita\{{$item->judul_seo}}\baca">Selanjutnya</a>
                                        </p>
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
                                    @if(trim($item->foto) == "")
										<a href="\berita\{{$item->judul_seo}}\baca"><img src="{!! asset('assets/images/berita/disnaker-no-images.png') !!}" alt=""></a>
									@else
										<a href="\berita\{{$item->judul_seo}}\baca"><img src="{!! asset('assets/images/berita/'.$item->foto) !!}" alt=""></a>
									@endif
                                </div>
                                <div class="post-data">
                                    <a href="\berita\cari?typ=kategori&search={{$item->kategori->id_kategori}}" class="post-catagory">{{$item->kategori->kategori}}</a>
                                    <div class="post-meta">
                                        <a href="\berita\{{$item->judul_seo}}\baca" class="post-title">
                                            <h6>{{$item->judul_berita}}</h6>
                                        </a>
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
					@if(isset($news_by_kategori))
					@foreach($news_by_kategori as $item)
                    <div class="single-blog-post small-featured-post d-flex">
                        <div class="post-thumb">
								@if(trim($item->foto) == "")
                                    <a href="\berita\{{$item->judul_seo}}\baca"><img src="{!! asset('assets/images/berita/disnaker-no-images.png') !!}" alt=""></a>
                                @else
									<a href="\berita\{{$item->judul_seo}}\baca"><img src="{!! asset('assets/images/berita/'.$item->foto) !!}" alt=""></a>
                                @endif
                        </div>
                        <div class="post-data">
                            <a href="\berita\cari?typ=kategori&search={{$item->kategori->id_kategori}}" class="post-catagory">{{$item->kategori->kategori}}</a>
                            <div class="post-meta">
                                <a href="\berita\{{$item->judul_seo}}\baca" class="post-title">
                                    <h6>{{$item->judul_berita}}</h6>
                                </a>
                                <p class="post-date"><span>{{$item->getPublishedAtAttribute($item->created_at)}}</span></p>
                            </div>
                        </div>
                    </div>
					@endforeach
					@endif
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
                        <h6>Berita Populer</h6>
                    </div>

                    <div class="row">

                        <!-- Single Post -->
						@foreach($populer as $item)
                        <div class="col-12 col-md-6">
                            <div class="single-blog-post style-3">
                                <div class="post-thumb">
                                    @if(trim($item->foto) == "")
										<a href="\berita\{{$item->judul_seo}}\baca"><img src="{!! asset('assets/images/berita/disnaker-no-images.png') !!}" alt=""></a>
									@else
										<a href="\berita\{{$item->judul_seo}}\baca"><img src="{!! asset('assets/images/berita/'.$item->foto) !!}" alt=""></a>
									@endif	
                                </div>
                                <div class="post-data">
                                    <a href="\berita\cari?typ=kategori&search={{$item->kategori->id_kategori}}" class="post-catagory">{{$item->kategori->kategori}}</a>
                                    <a href="\berita\{{$item->judul_seo}}\baca" class="post-title">
                                        <h6>{{$item->judul_berita}}</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
						@endforeach
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="section-heading">
                        <h6>Info</h6>
                    </div>

                    <!-- Newsletter Widget -->
                      <div class="newsletter-widget mb-50">
                            <h4>Berlangganan dengan Disnaker</h4>
                            <p>Dapatkan berita terbaru Dinas Ketenagakerjaan Kabupaten Indramayu</p>
                            <form action="#" method="post">
                                <input type="text" name="text" placeholder="Nama">
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
				@foreach($news_video as $item)
                 <div class="single-video-post">
                        <img src="http://i3.ytimg.com/vi/{{$item->toYtId($item->yt)}}/hqdefault.jpg" alt="">
                        <!-- Video Button -->
                        <div class="videobtn">
                            <a href="{{$item->yt}}" class="videoPlayer"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                 </div>&nbsp;&nbsp;&nbsp;
				@endforeach
            </div>
        </div>
    </div>
    <!-- ##### Video Post Area End ##### -->

	@include('layout.footer')