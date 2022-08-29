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
        Schema::create('aspirasi', function (Blueprint $table) {
            $table->bigIncrements('id_aspirasi');
            $table->foreignId('mahasiswa_id')->references('id_mahasiswa')->on('mahasiswa')->onUpdate('cascade')->onDelete('cascade');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->enum('kategori', ['perkuliahan','fasilitas','kemahasiswaan','layanan','administrasi']);
            $table->text('kritik');
            $table->text('saran');
            $table->text('harapan');
            $table->boolean('verifikasi_admin')->default(0);
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
        Schema::dropIfExists('aspirasi');
    }
};
