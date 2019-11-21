@extends('Admin.layouts.app')
@section('title', 'TAMBAH MENU | DISNAKER INDRAMAYU')
@section('content')

<div class="animated fadeIn">
    
<div class="card">
        <div class="card-body">
    <div class="row form-group">
        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Nama Menu</label></div>
        <div class="col-12 col-md-9"><input type="email" id="email-input" name="email-input" placeholder="Enter Email" class="form-control"><small class="help-block form-text">Silakan Tambah Menu</small></div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3"><label for="select" class=" form-control-label">Level Menu</label></div>
            <div class="col-12 col-md-9">
                <select name="select" id="select" class="form-control">
                    <option value="0">Menu Utama</option>
                </select>
            </div>
        </div>
    <div class="row form-group">
        <div class="col col-md-3"><label class=" form-control-label">Aktivasi</label></div>
            <div class="col col-md-9">
                <div class="form-check">
                    <div class="radio">
                         <label for="radio1" class="form-check-label ">
                             <input type="radio" id="radio1" name="radios" value="option1" class="form-check-input">Ya
                         </label>
                    </div>
                    <div class="radio">
                         <label for="radio2" class="form-check-label ">
                             <input type="radio" id="radio2" name="radios" value="option2" class="form-check-input">Tidak
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
</div>
</div>
@endsection