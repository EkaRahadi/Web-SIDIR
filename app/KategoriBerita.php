<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    protected $primaryKey = 'id_kategori';
	protected $table = 'tb_kategori_berita';
	protected $fillable = [ 
		'kategori'
	];
}
