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
		Schema::create('tb_kategori_berita', function (Blueprint $table) {
            $table->Increments('id_kategori');
            $table->char('kategori', 100);
            $table->timestamps();
			$table->softDeletes();
        });
		
        Schema::create('tb_berita', function (Blueprint $table) {
            $table->bigIncrements('id_berita');
            $table->char("judul_berita", 50);
            $table->char('judul_seo', 100);
            $table->integer('id_kategori')->unsigned();
			$table->foreign('id_kategori')->references('id_kategori')->on('tb_kategori_berita')->onDelete('cascade');
            $table->text('isi_berita');
            $table->char('foto', 100);
            $table->char('yt', 100);
            $table->enum('status',['YA', 'TIDAK']);
            $table->integer('views');
            $table->integer('post_by');
            $table->timestamps();
			$table->softDeletes();
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
        Schema::dropIfExists('tb_kategori_berita');
    }
}
