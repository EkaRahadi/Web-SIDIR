@include('layout.header')
<div class="blog-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">

                        <!-- Single Featured Post -->
                        <div class="single-blog-post featured-post single-post">
                            <div class="post-thumb">
                                <a href="#"><img src="img/bg-img/25.jpg" alt=""></a>
                            </div>
                            <div class="post-data">
                                <a href="#" class="post-catagory">Finance</a>
                                <a href="#" class="post-title">
                                    <h6>Financial news: A new company is born today at the stock market</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#">Christinne Williams</a></p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placerat. Sed varius leo ac leo fermentum, eu cursus nunc maximus. Integer convallis nisi nibh, et ornare neque ullamcorper ac. Nam id congue lectus, a venenatis massa. Maecenas justo libero, vulputate vel nunc id, blandit feugiat sem.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque consectetur, purus imperdiet volutpat tincidunt, eros sem mollis quam, ut placerat urna neque at massa. Proin vitae pulvinar justo. Donec vel placerat enim, at ultricies risus. In posuere luctus sem, ac dapibus felis semper quis. Integer ex ante, semper at velit nec, ultrices aliquet diam. Donec gravida non metus blandit facilisis. Cras tincidunt, lorem aliquam molestie eleifend, libero dui volutpat dui, nec sodales massa libero ut metus. Mauris pretium elit ut dapibus consequat. Nam ut lorem nec sem dignissim gravida. Duis fringilla, augue eget lacinia tincidunt, neque leo maximus sem, sed tristique enim orci id quam.</p>
                                    <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellentesque lectus et accumsan aliquam. Fusce lobortis cursus quam, id mattis sapien. Aliquam erat volutpat. Aliquam placerat, est quis sagittis tincidunt, ipsum eros posuere mi, ut finibus quam sem eget ex. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec commodo quis enim ac auctor. Ut et mollis felis, sit amet ultricies est. Suspendisse sed faucibus tortor.</p>
                                    <a href="#" class="related--post">Related: Facebook announces changes to combat election meddling</a>
                                    <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellentesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien. Aliquam erat volutpat. Aliquam placerat, est quis sagi ttis tincidunt, ipsum eros posuere mi, ut finibus quam sem eget ex. Interdum et malesuada fames ac ante ipsum pr imis in faucibus. Donec commodo quis enim ac auctor. Ut et mollis felis, sit amet ultricies est. Suspendisse sed faucibus tortor. </p>
                                    <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                                        <!-- Tags -->
                                        <div class="newspaper-tags d-flex">
                                            <span>Tags:</span>
                                            <ul class="d-flex">
                                                <li><a href="#">finacial,</a></li>
                                                <li><a href="#">politics,</a></li>
                                                <li><a href="#">stock market</a></li>
                                            </ul>
                                        </div>

                                        <!-- Post Like & Post Comment -->
                                        <div class="d-flex align-items-center post-like--comments">
                                            <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
                                            <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pager d-flex align-items-center justify-content-between">
                            @if(count($prev)>0)
							<div class="prev">
                                <a href="{{url('/berita/'.$prev[0]->judul_seo.'/baca')}}"><i class="fa fa-angle-left"></i> previous</a>
                            </div>
							@endif
							@if(count($next)>0)
                            <div class="next">
                                <a href="{{url('/berita/'.$next[0]->judul_seo.'/baca')}}">Next <i class="fa fa-angle-right"></i></a>
                            </div>
							@endif
                        </div>

                        <div class="section-heading">
                            <h6>Related</h6>
                        </div>

                        <div class="row">
                            <!-- Single Post -->
                            <div class="col-12 col-md-6">
                                <div class="single-blog-post style-3 mb-80">
                                    <div class="post-thumb">
                                        <a href="#"><img src="img/bg-img/12.jpg" alt=""></a>
                                    </div>
                                    <div class="post-data">
                                        <a href="#" class="post-catagory">Finance</a>
                                        <a href="#" class="post-title">
                                            <h6>Dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                                        </a>
                                        <div class="post-meta d-flex align-items-center">
                                            <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
                                            <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Post -->
                            <div class="col-12 col-md-6">
                                <div class="single-blog-post style-3 mb-80">
                                    <div class="post-thumb">
                                        <a href="#"><img src="img/bg-img/13.jpg" alt=""></a>
                                    </div>
                                    <div class="post-data">
                                        <a href="#" class="post-catagory">Finance</a>
                                        <a href="#" class="post-title">
                                            <h6>Dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                                        </a>
                                        <div class="post-meta d-flex align-items-center">
                                            <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
                                            <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Comment Area Start -->
                        

                        <div class="post-a-comment-area section-padding-80-0">
                            <h4>Komentar</h4>
                            <div class="fb-comments" data-href="{{url()->current()}}" data-width="" data-numposts="5"></div><br>
							<div class="fb-like" data-href="{{url()->current()}}" data-width="" data-layout="button" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
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

                        <!-- Popular News Widget -->
                        <div class="popular-news-widget mb-50">
                            <h3>{{count($news_by_kategori)}} Most Popular News</h3>
							
                            <!-- Single Popular Blog -->
							@foreach($news_by_kategori as $key => $item)
                            <div class="single-popular-post">
                                <a href="\berita\{{$item->judul_seo}}\baca">
                                    <h6><span>{{++$key}}.</span> {{$item->judul_berita}}</h6>
                                </a>
                                <p>{{$item->getPublishedAtAttribute($item->created_at)}}</p>
                            </div>
							@endforeach
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

                        <!-- Latest Comments Widget -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->
	
	@include('layout.footer')