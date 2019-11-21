<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $primaryKey = 'id_menu';
	protected $table = 'tb_menu';
	protected $fillable = [ 
		'parent', 'nama_menu', 'link', 'status','urutan'
	];
}
