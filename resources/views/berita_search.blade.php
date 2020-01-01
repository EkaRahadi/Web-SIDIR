@include('layout.header')
<div class="blog-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card">
							<div class="card-header"> 
								<h5><i>{{$card_header}}</i></h5>
								<p align="right">
									 Ditemukan {{$berita->total()}} Data 
								</p>
							</div>
							
							<div class="card-body">
							@foreach($berita as $item)
								<div class="single-blog-post small-featured-post d-flex">
									<div class="post-thumb">
										<a href="\berita\key\baca"><img src="{!! asset('assets/images/berita/disnaker-no-images.png') !!}" alt=""></a>
									</div>
									<div class="post-data">
										<a href="\berita\{{$item->judul_seo}}\baca" class="post-title">{{$item->judul_berita}}</a>
										<div class="post-meta">
											<a href="\berita\{{$item->judul_seo}}\baca" class="post-title">
												<h6>{{ strip_tags(substr($item->isi_berita, 0, 50)) }}.... Selanjutnya</h6>
											</a>
											<p class="post-date"><span>{{$item->getPublishedAtAttribute($item->created_at)}}</span></p>
										</div>
									</div>
								</div>
							@endforeach
							@if(count($berita)<1) <h4>Data Tidak Ditemukan</h4> @endif
							</div>
							@if ($berita->hasPages())
							<div class="card-footer text-center"> 
							{{$berita->links()}}
							</div>
							@endif
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