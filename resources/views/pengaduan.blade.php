@include('layout.header')
<div class="blog-area section-padding-0-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card">
						<div class="card-header bg-warning">
						<h3>Pengaduan Masyarakat</h3>
					  </div>
					  <form method="POST" action="{{route('submit_pengaduan')}}">{{csrf_field()}}
					  <div class="card-body">
					  @if ($errors->any())
						  <div class="alert alert-danger" data-dismiss="alert">
							  <ul>
								  @foreach ($errors->all() as $error)
									  <li>{{ $error }}</li>
								  @endforeach
							  </ul>
						  </div><br />
						  @endif
					  @if ($message = Session::get('info'))
						<div class="alert alert-info" data-dismiss="alert">
							<strong>Info :</strong> {{ $message }}
						</div>
					 @endif
					 @if ($message = Session::get('kode'))
						<div class="alert alert-warning" data-dismiss="alert">
							<strong>Silahkan catat kode pengaduan anda :</strong> {{ $message }}
						</div>
					 @endif
						<div class="row form-group">
							<div class="col col-md-3"><label for="email-input" class=" form-control-label">*Nama</label></div>
							<div class="col-12 col-md-9"><input value="" type="text" name="nama" placeholder="Nama Anda" class="form-control" required></div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3"><label for="email-input" class=" form-control-label">*Nomor HP</label></div>
							<div class="col-12 col-md-9"><input value="" type="number" name="nope" placeholder="Nomor HP" class="form-control" required></div>
						</div>
					  <div class="row form-group">
						<div class="col col-md-3"><label for="email-input" class=" form-control-label">*Isi Berita</label></div>
						<div class="col-12 col-md-9">
							<textarea name="isi_pengaduan" id='editor1'></textarea>
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3">
						<div class="captcha">
					   <span>{!! captcha_img() !!}</span>
					   <button type="button" class="btn btn-success"><i class="fa fa-refresh" id="refresh"></i></button>
					   </div></div>
						<div class="col-12 col-md-9">
							<input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
						</div>
					</div>
					  </div>
					  <div class="card-footer">
					  <input type="submit" value="Kirim" class="btn btn-primary">
					  <input type="reset" value="Reset" class="btn btn-default">
					  </form>
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
	<script src="{{url('assets/ckeditor4/ckeditor.js')}}"></script>
			<script type="text/javascript">
			 CKEDITOR.replace( 'editor1' );
				$('#refresh').click(function(){
				  $.ajax({
					 type:'GET',
					 url:'/refreshcaptcha',
					 success:function(data){
						$(".captcha span").html(data.captcha);
					 }
				  });
				});
				</script>
	@include('layout.footer')