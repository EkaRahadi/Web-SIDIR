<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Halaman extends Model
{
    //
	protected $table = 'tb_halaman';
	protected $fillable = [ 
		'judul_halaman', 'judul_seo', 'isi_halaman', 'foto','yt', 'status'
	];
	public function getPublishedAtAttribute($date)
	{
		$date = new \Carbon\Carbon($date);
		return $date->toDateTimeString();
	}
}
