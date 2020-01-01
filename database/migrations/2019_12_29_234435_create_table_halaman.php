<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHalaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_halaman', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->char("judul_halaman", 50);
            $table->char('judul_seo', 100);
			$table->text('isi_halaman')->nullable();
            $table->char('foto', 100)->nullable();
            $table->char('yt', 100)->nullable();
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
        Schema::dropIfExists('tb_halaman');
    }
}
