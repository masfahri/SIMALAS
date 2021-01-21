<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipGuruToMapel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mapping_mapel_to_guru', function (Blueprint $table) {
            $table->foreign('kd_guru')->references('kd_guru')->on('guru')
                    ->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('kd_mapel')->references('kd_mapel')->on('mata_pelajaran')
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
        Schema::table('mapping_mapel_to_guru', function (Blueprint $table) {
            $table->dropForeign('mapping_mapel_to_guru_kd_guru_foreign');
            $table->dropForeign('mapping_mapel_to_guru_kd_mapel_foreign');
        });
    }
}
