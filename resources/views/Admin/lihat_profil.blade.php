@extends('Admin.layouts.app')
@section('title', 'PROFIL | DISNAKER INDRAMAYU')
@section('content')	
<div class="animated fadeIn">
<div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">{{$judul}}</div>
                        <div class="card-body card-block">
                            <form method="post" enctype="multipart/form-data">{{csrf_field()}}
                                <div class="form-group">
								<center>
									@if($user->foto == null)
										<img id="image-preview" class="img-thumbnail" src="{!! asset('assets/images/berita/disnaker-no-images.png') !!}" width="350px">
										@else
										<img id="image-preview" class="img-thumbnail" src="{!! asset('assets/images/pengguna/'.$user->foto) !!}" width="350px">
									@endif
									<input type="file" name="foto" class="form-control" id="image-source" onChange="previewImage()">
								</center>
								</div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Nomor Identitas</div>
                                        <input value="{{$user->no_id}}" type="number" name="no_id" placeholder="Nomor Identitas" class="form-control">
                                    </div>
                                </div>
								<div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Nama Lengkap</div>
                                        <input value="{{$user->nama}}" type="text" name="nama" placeholder="Nama Lengkap" class="form-control">
                                    </div>
                                </div>
								<div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Username</div>
                                        <input value="{{$user->username}}" type="text" name="username" placeholder="Username" class="form-control">
                                    </div>
                                </div>
								<div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Password</div>
                                        <input type="password" name="password" placeholder="Password" class="form-control">
                                    </div>
                                </div>
								<div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Konfirmasi Password</div>
                                        <input type="password" name="kon_pas" placeholder="Konfirmasi Password" class="form-control">
                                    </div>
                                </div>
								<div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Alamat</div>
                                        <textarea name="alamat" class="form-control" rows="7">{{$user->alamat}}</textarea>
                                    </div>
                                </div>
								<div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Nomor HP</div>
                                        <input value="{{$user->nope}}" type="number" name="nope" placeholder="Nomor HP" class="form-control">
                                    </div>
                                </div>
								<div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Email</div>
                                        <input value="{{$user->email}}" type="email" name="email" placeholder="Email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-actions form-group"><button type="submit" class="btn btn-secondary btn-sm">Submit</button></div>
                            </form>
                        </div>
                    </div>
                </div>
</div>
@endsection