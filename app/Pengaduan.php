<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
	protected $fillable = [ 
		'nama', 'nope', 'isi_pengaduan','kode_pengaduan', 'dilihat'
	];
}
