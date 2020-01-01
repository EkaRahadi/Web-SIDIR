@include('layout.header')
<div class="blog-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">
					
                        <!-- Single Featured Post -->
                        <div class="single-blog-post featured-post single-post">
                            @if(trim($page->foto) != "")
							<div class="post-thumb"><center>
								<a href="\halaman\{{$page->judul_seo}}"><img src="{!! asset('assets/images/halaman/'.$page->foto) !!}" alt="" width="250px"></a>
                            </center></div>
							@endif
                            <div class="post-data">
                               
								<div class="post-meta">
									<a href="\berita\{{$page->judul_seo}}\baca" class="post-title">
										<h6>{{$page->judul_halaman}}</h6>
									</a>
									<hr>
									<p class="post-date"><span>{{$page->getPublishedAtAttribute($page->created_at)}}</span></p>
									<hr>
								</div>
                                <div class="post-meta">
                                    
                                    {!! $page->isi_halaman !!}
									<div class="newspaper-post-like d-flex align-items-center justify-content-between">
                                        <!-- Tags -->
                                        <!--<div class="newspaper-tags d-flex">
                                            <span>Tags:</span>
                                            <ul class="d-flex">
                                                <li><a href="#">finacial,</a></li>
                                                <li><a href="#">politics,</a></li>
                                                <li><a href="#">stock market</a></li>
                                            </ul>
                                        </div>

                                        <div class="d-flex align-items-center post-like--comments">
                                            <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
                                            <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">

                        <!-- Latest Posts Widget -->
                        <div class="latest-posts-widget mb-50">

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
                        </div>
                        <div class="popular-news-widget mb-50">
                            <h3>{{count($populer)}} Most Popular News</h3>
							@foreach($populer as $key => $item)
                            <div class="single-popular-post">
                                <a href="\berita\{{$item->judul_seo}}\baca">
                                    <h6><span>{{++$key}}.</span> {{$item->judul_berita}}</h6>
                                </a>
                                <p>{{$item->getPublishedAtAttribute($item->created_at)}}</p>
                            </div>
							@endforeach
                        </div>
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
    </div>
	
	@include('layout.footer')