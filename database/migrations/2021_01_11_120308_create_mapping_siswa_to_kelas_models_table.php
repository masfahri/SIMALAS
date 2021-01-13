<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMappingSiswaToKelasModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapping_siswa_to_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('kd_mapping_siswa_to_kelas');
            $table->string('kd_siswa');
            $table->string('kd_kelas');
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
        Schema::dropIfExists('mapping_siswa_to_kelas');
    }
}
