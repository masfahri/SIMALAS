<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugass', function (Blueprint $table) {
            $table->id();
            $table->string('kd_guru_mapel');
            $table->unsignedBigInteger('kelas_sub_jurusan_id');
            $table->enum('jenis_tugas', ['pilihan-ganda', 'essai', 'vokal']);
            $table->string('judul_tugas');
            $table->string('deskripsi_tugas');
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
        Schema::dropIfExists('tugass');
    }
}
