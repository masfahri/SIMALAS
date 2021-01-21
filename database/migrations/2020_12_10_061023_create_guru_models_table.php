<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuruModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('kd_guru')->nullable()->unique();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('nip')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->default('L');
            $table->enum('flag', ['active', 'de-active'])->default('active');
            $table->String('tempat_lahir')->nullable();
            $table->date('tanngal_lahir')->nullable();
            $table->string('nomor_telf')->nullable();
            $table->string('pas_foto')->nullable();
            $table->enum('agama', ['islam', 'hindu', 'budha', 'kristen', 'protestan', 'lainnya'])->default('islam');
            $table->enum('status_nikah', ['Lajang', 'Menikah'])->default('Lajang');
            $table->string('nama_ibu')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->enum('status_kepegawaian', ['honorer', 'pns'])->default('honorer');
            $table->enum('jenis_ptk', ['Sertifikasi', 'Belum Sertifikasi'])->default('Sertifikasi');
            $table->string('lembaga_sertifikasi')->nullable();
            $table->integer('no_sk')->nullable();
            $table->date('tgl_sk')->nullable();
            $table->bigInteger('nuptk')->nullable();
            $table->date('tmt_tugas')->nullable();
            $table->date('tugas_tambahan')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('guru');
    }
}
