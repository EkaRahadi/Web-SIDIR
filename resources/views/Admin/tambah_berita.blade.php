@extends('Admin.layouts.app')
@section('title', 'TAMBAH BERITA | DISNAKER INDRAMAYU')
@section('content')
<form action="proses_tambah_berita" method="POST" enctype="multipart/form-data">
{{csrf_field()}}
<div class="animated fadeIn">
<div class="card">
  <div class="card-body">
    <div class="row form-group">
        <div class="col col-md-3"><label for="email-input" class=" form-control-label">*Judul Berita</label></div>
        <div class="col-12 col-md-9"><input type="text" id="judul_berita" name="judul_berita" placeholder="Judul Berita" class="form-control"></div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3"><label for="select" class=" form-control-label">*Kategori</label></div>
        <div class="col-12 col-md-9">
            <select name="id_kategori" id="select" class="form-control">
				@foreach($kategori as $item)
				<option value="{{$item->id_kategori}}">{{$item->kategori}}</option>
				@endforeach
            </select>
        </div>
    </div>
	<div class="row form-group">
        <div class="col col-md-3"><label for="email-input" class=" form-control-label">*Isi Berita</label></div>
        <div class="col-12 col-md-9">
			<textarea name="isi_berita"></textarea>
		</div>
    </div>
	<div class="row form-group">
        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Foto</label></div>
        <div class="col-12 col-md-9">
			<input type="file" id="file-input" name="foto" class="form-control-file">
		</div>
    </div>
	<div class="row form-group">
        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Sematkan Video Youtube</label></div>
        <div class="col-12 col-md-9">
			<input type="text" id="email-input" name="yt" placeholder="Link Youtube" class="form-control">
			<small class="help-block form-text">Copy Link Youtube</small>
		</div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3"><label class=" form-control-label">*Aktivasi</label></div>
            <div class="col col-md-9">
                <div class="form-check">
                    <div class="radio">
                         <label for="radio1" class="form-check-label ">
                             <input type="radio" id="radio1" name="status" value="YA" class="form-check-input">Ya
                         </label>
                    </div>
                    <div class="radio">
                         <label for="radio2" class="form-check-label ">
                             <input type="radio" id="radio2" name="status" value="TIDAK" checked class="form-check-input">Tidak
                         </label>
                     </div>
                                               
                </div>
             </div>
          </div>*Harus Di isi
</div>
  </form>                                 
          <div class="card-footer align-left">
                <button type="button" onClick="submit_form(0, 0)" class="btn btn-primary btn-sm">Simpan</button>
                <button type="reset" class="btn btn-default btn-sm">Batal</button>
           </div>
</div>
</div>
<script src="{!! asset('assets/assets/js/lib/data-table/datatables.min.js') !!}"></script>

@endsection