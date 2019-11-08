<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbPengguna extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('tb_pengguna', function (Blueprint $table) {
        $table->bigIncrements('id_pengguna');
        $table->string('no_id');
        $table->string('nama',100);
        $table->string('username', 50);
        $table->string('password',255);
		$table->string('alamat');
		$table->string('nope');
		$table->string('email');
		$table->integer('level');
        $table->rememberToken();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('tb_pengguna');
    }
}
