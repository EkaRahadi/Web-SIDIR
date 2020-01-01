<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    //
	public $timestamps = false;
	protected $table = 'tb_visitor';
	protected $dates = ['created_at'];
	protected $fillable = [ 
		'ip', 'browser', 'os','created_at'
	];
}
