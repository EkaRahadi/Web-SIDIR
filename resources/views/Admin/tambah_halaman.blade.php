@extends('Admin.layouts.app')
@section('title', 'TAMBAH HALAMAN | DISNAKER INDRAMAYU')
@section('content')
<form method="POST" enctype="multipart/form-data">
{{csrf_field()}}
@if(isset($page))<input type="hidden" value="{{$page->id}}" name="id_halaman">@endif
<div class="animated fadeIn">
<div class="card">
  <div class="card-body">
    <div class="row form-group">
        <div class="col col-md-3"><label for="email-input" class=" form-control-label">*Judul Halaman</label></div>
        <div class="col-12 col-md-9"><input @if(isset($page)) value="{{$page->judul_halaman}}" @endif type="text" id="judul_halaman" name="judul_halaman" placeholder="Judul Halaman" class="form-control"></div>
    </div>
	<div class="row form-group">
        <div class="col col-md-3"><label for="email-input" class=" form-control-label">*Isi Halaman</label></div>
        <div class="col-12 col-md-9">
			<textarea name="isi_halaman">@if(isset($page)) {{$page->isi_halaman}} @endif </textarea>
		</div>
    </div>
	<div class="row form-group">
        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Foto</label></div>
        <div class="col-12 col-md-9">
			<input type="file" id="file-input" name="foto" class="form-control-file">
			@if(isset($page)) Foto Saat Ini: <i style="color:red">{{$page->foto}}"</i> @endif 
		</div>
    </div>
	<div class="row form-group">
        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Sematkan Video Youtube</label></div>
        <div class="col-12 col-md-9">
			<input type="text" @if(isset($page)) value="{{$page->yt}}" @endif id="email-input" name="yt" placeholder="Link Youtube" class="form-control">
			<small class="help-block form-text">Copy Link Youtube</small>
		</div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3"><label class=" form-control-label">*Aktivasi</label></div>
            <div class="col col-md-9">
                <div class="form-check">
                    <div class="radio">
                         <label for="radio1" class="form-check-label ">
                             <input type="radio" id="radio1" name="status" value="YA" class="form-check-input" @if(isset($page)) @if($page->status == "YA") checked @endif @endif >Ya
                         </label>
                    </div>
                    <div class="radio">
                         <label for="radio2" class="form-check-label ">
                             <input type="radio" id="radio2" name="status" value="TIDAK" @if(isset($page)) @if($page->status == "TIDAK") checked @endif @else checked @endif class="form-check-input">Tidak
                         </label>
                     </div>
                                               
                </div>
             </div>
          </div>*Harus Di isi
</div>
  </form>                                 
          <div class="card-footer align-left">
				@if(isset($page))
                <button type="button" onClick="submit_form(1, {{$page->id}})" class="btn btn-primary btn-sm">Simpan</button>
                @else
				<button type="button" onClick="submit_form(1, 0)" class="btn btn-primary btn-sm">Simpan</button>
                @endif
				<button type="reset" class="btn btn-default btn-sm">Batal</button>
           </div>
</div>
</div>
<script src="{!! asset('assets/assets/js/lib/data-table/datatables.min.js') !!}"></script>

@endsection