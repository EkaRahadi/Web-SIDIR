@extends('Admin.layouts.app')
@section('title', 'MENU | DISNAKER INDRAMAYU')
@section('content')

<div class="animated fadeIn">
    <form action="/admin/proses_tambah_edit" method="POST">
    {{csrf_field()}}
	@if(isset($menu)) <input type="hidden" value="{{$menu->id_menu}}" name="id_menu"> @endif
<div class="card">
        <div class="card-body">
    <div class="row form-group">
        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Nama Menu</label></div>
        <div class="col-12 col-md-9"><input type="text" id="email-input" @if(isset($menu)) value="{{$menu->nama_menu}}" @endif name="nama_menu" placeholder="nama menu" class="form-control" required><small class="help-block form-text">Silakan tambah menu</small></div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Link</label></div>
        <div class="col-12 col-md-9">
			<input type="text" id="link_input" @if(isset($menu)) value="{{$menu->link}}" @endif name="link" placeholder="link" class="form-control" required>
			<select onChange="set_value(this.value)" class="form-control">
			@foreach($pages as $i)
				<option @if(isset($menu)) @if($menu->link == "/halaman/".$i->judul_seo) selected @endif @endif value="/halaman/{{$i->judul_seo}}">/halaman/{{$i->judul_seo}}</option>
			@endforeach
			</select>
			<small class="help-block form-text">Silakan tambah link</small>
		</div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Urutan</label></div>
        <div class="col-12 col-md-9"><input type="number" @if(isset($menu)) value="{{$menu->urutan}}" @endif id="email-input" name="urutan" placeholder="urutan" class="form-control"><small class="help-block form-text">Silakan tambah urutan</small></div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3"><label for="select" class=" form-control-label">Level Menu</label></div>
            <div class="col-12 col-md-9">
                <select name="parent" id="select" class="form-control">
                    <option value="0">Menu Utama</option>
                    @foreach($menus as $i)
                    <option @if(isset($menu)) @if($menu->id_menu == $i->id_menu) selected @endif @endif value="{{$i->id_menu}}">{{$i->nama_menu}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    <div class="row form-group">
        <div class="col col-md-3"><label class=" form-control-label">Aktivasi</label></div>
            <div class="col col-md-9">
                <div class="form-check">
                    <div class="radio">
                         <label for="radio1" class="form-check-label ">
                             <input type="radio" id="radio1" name="aktivasi" value="a" class="form-check-input" @if(isset($menu)) @if($menu->status == "a") checked @endif @endif >Ya
                         </label>
                    </div>
                    <div class="radio">
                         <label for="radio2" class="form-check-label ">
                             <input type="radio" id="radio2" name="aktivasi" value="na" class="form-check-input" @if(isset($menu)) @if($menu->status == "na") checked @endif @endif >Tidak
                         </label>
                     </div>
                                               
                </div>
             </div>
          </div>
</div>
                                   
          <div class="card-footer align-left">
                <button type="submit" class="btn btn-primary btn-sm">
                      <i class="fa fa-dot-circle-o"></i> Simpan
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                      <i class="fa fa-ban"></i> Batal
                </button>
           </div>
           </form>
</div>
</div>
<script>

	  function set_value(value){
		  document.getElementById("link_input").value = value
	  }
</script>
@endsection