<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipKelasSubJurusan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kelas_sub_jurusan', function (Blueprint $table) {
            $table->foreign('kd_kelas')->references('kd_kelas')->on('kelas')
            ->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->foreign('kd_sub_kelas')->references('kd_sub_kelas')->on('sub_kelas')
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
        Schema::table('kelas_sub_jurusan', function (Blueprint $table) {
            $table->dropForeign('kelas_sub_jurusan_kd_kelas_foreign');
            $table->dropForeign('kelas_sub_jurusan_kd_sub_kelas_foreign');
        });

    }
}
