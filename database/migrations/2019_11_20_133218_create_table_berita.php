<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBerita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_berita', function (Blueprint $table) {
            $table->bigIncrements('id_berita');
            $table->char("judul_berita", 50);
            $table->integer('post_by');
            $table->integer('views');
            $table->text('isi_berita');
            $table->char('foto', 100);
            $table->char('yt', 100);
            $table->enum('status',['YA', 'TIDAK']);
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
        Schema::dropIfExists('tb_berita');
    }
}
