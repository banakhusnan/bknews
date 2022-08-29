<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->bigIncrements('id_berita');
            $table->foreignId('author_id')->references('id_author')->on('author')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('subkategori_id')->references('id_subkategori')->on('subkategori')->onUpdate('cascade')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('deskripsi');
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
        Schema::dropIfExists('berita');
    }
};
