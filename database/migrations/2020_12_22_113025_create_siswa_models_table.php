<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('kd_siswa')->unique();
            $table->bigInteger('nis')->unique();
            $table->bigInteger('nisn')->unique();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->enum('agama', ['Islam', 'Kristen', 'Protestan', 'Hindu', 'Budha']);
            $table->String('tempat_lahir')->default(null);
            $table->String('tanggal_lahir')->default(null);
            $table->String('nomor_telf')->default(null);
            $table->String('pas_foto')->default(null);
            $table->String('nama_ayah')->default(null);
            $table->String('nama_ibu')->default(null);
            $table->bigInteger('created_by')->default(0);
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
        Schema::dropIfExists('siswa');
    }
}
