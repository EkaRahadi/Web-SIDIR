<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $primaryKey = 'id_berita';
	protected $table = 'tb_berita';
	protected $fillable = [ 
		'judul_berita', 'post_by', 'views', 'isi_berita', 'foto', 'status'
	];
	public function post(){
		return $this->belongsTo('\App\Pengguna', 'post_by');
	}
	
	public function getPublishedAtAttribute($date)
	{
		$date = new \Carbon\Carbon($date);
		return $date->toDateTimeString();
	}
}
