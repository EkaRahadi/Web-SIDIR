<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->bigIncrements('id_pengaduan');
            $table->char('nama',50);
            $table->char('nope',20);
            $table->text('isi_pengaduan')->nullable();
            $table->char('kode_pengaduan');
            $table->enum('dilihat', ['SUDAH', 'BELUM']);
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
        Schema::dropIfExists('pengaduan');
    }
}
