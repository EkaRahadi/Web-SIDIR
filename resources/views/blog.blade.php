@include('layout.header')
<div class="blog-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">

                        <!-- Single Featured Post -->
                        <div class="single-blog-post featured-post single-post">
                            <div class="post-thumb">
								@if(trim($berita[0]->foto) == "")
                                    <a href="\berita\{{$berita[0]->judul_seo}}\baca"><img src="{!! asset('assets/images/berita/disnaker-no-images.png') !!}" width="350px" alt=""></a>
                                @else
									<a href="\berita\{{$berita[0]->judul_seo}}\baca"><img src="{!! asset('assets/images/berita/'.$berita[0]->foto) !!}" alt="" width="350px"></a>
                                @endif
                            </div>
                            <div class="post-data">
                                <a href="\berita\cari?typ=kategori&search={{$berita[0]->kategori->id_kategori}}" class="post-catagory">{{$berita[0]->kategori->kategori}}</a>
								<div class="post-meta">
									<a href="\berita\{{$berita[0]->judul_seo}}\baca" class="post-title">
										<h6>{{$berita[0]->judul_berita}}</h6>
									</a>
									<p class="post-date"><span>{{$berita[0]->getPublishedAtAttribute($berita[0]->created_at)}}</span></p>
								</div>
                                <div class="post-meta">
								<i class="btn btn-default fa fa-eye" title="Dilihat">   {{$berita[0]->views}}</i>
								<div class="fb-like" data-href="{{url()->current()}}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
								
                                    <p class="post-author">By <a href="#">{{$berita[0]->post->nama}}</a></p>
                                    {!! $berita[0]->isi_berita !!}
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

                        <div class="pager d-flex align-items-center justify-content-between">
                            @if(count($prev)>0)
							<div class="prev">
                                <a href="{{url('/berita/'.$prev[0]->judul_seo.'/baca')}}"><i class="fa fa-angle-left"></i> Sebelumnya</a>
                            </div>
							@endif
							@if(count($next)>0)
                            <div class="next">
                                <a href="{{url('/berita/'.$next[0]->judul_seo.'/baca')}}">Selanjutnya <i class="fa fa-angle-right"></i></a>
                            </div>
							@endif
                        </div>

                        <div class="section-heading">
                            <h6>Berita Terkait</h6>
                        </div>

                        <div class="row">
                            <!-- Single Post -->
							@foreach($related as $item)
                            <div class="col-12 col-md-6">
                                <div class="single-blog-post style-3 mb-80">
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
                                        <!--<div class="post-meta d-flex align-items-center">
                                            <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
                                            <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
							@endforeach
                        </div>

                        <!-- Comment Area Start -->
                        

                        <div class="post-a-comment-area section-padding-80-0">
                            <h4>Komentar</h4>
                            <div class="fb-comments" data-href="{{url()->current()}}" data-width="" data-numposts="5"></div><br>
							
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