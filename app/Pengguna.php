<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    //
	use Notifiable;
	protected $primaryKey = 'id_pengguna';
	protected $table = 'tb_pengguna';
	protected $hidden = [
        'password', 'remember_token',
    ];
	protected $fillable = [ 
		'no_id', 'nama', 'username', 'password' ,'alamat', 'foto', 'nope', 'email', 'level'
	];
	
	public function setPasswordAttribute($value)
    {
      $this->attributes['password'] = bcrypt($value);
	}

}
