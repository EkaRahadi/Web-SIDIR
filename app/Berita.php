<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $primaryKey = 'id_berita';
	protected $table = 'tb_berita';
	protected $fillable = [ 
		'judul_berita', 'judul_seo', 'id_kategori', 'isi_berita', 'foto', 'yt', 'status', 'views', 'post_by'
	];
	public function post(){
		return $this->belongsTo('\App\Pengguna', 'post_by');
	}
	public function kategori(){
		return $this->belongsTo('\App\KategoriBerita', 'id_kategori');
	}
	public function getPublishedAtAttribute($date)
	{
		$date = new \Carbon\Carbon($date);
		return $date->toDateTimeString();
	}
}
