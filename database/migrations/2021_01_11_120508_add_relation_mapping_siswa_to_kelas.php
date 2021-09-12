<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationMappingSiswaToKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mapping_siswa_to_kelas', function (Blueprint $table) {
            $table->foreign('kd_siswa')->references('kd_siswa')->on('siswa')
            ->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('kd_kelas')->references('id')->on('kelas_sub_jurusan')
            ->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mapping_siswa_to_kelas', function (Blueprint $table) {
            $table->dropForeign('mapping_siswa_to_kelas_kd_siswa_foreign');
            $table->dropForeign('mapping_kelas_to_kelas_kd_kelas_foreign');
        });

    }
}
