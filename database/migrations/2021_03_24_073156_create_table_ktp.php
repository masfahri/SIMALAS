<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKtp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_cat_product', function (Blueprint $table) {
            $table->unsignedBigInteger('_id')->unique();
            $table->string('category_name');
            $table->timestamps();
        });

        Schema::create('table_product', function (Blueprint $table) {
            $table->unsignedBigInteger('_id')->unique();
            $table->string('product_name');
            $table->decimal('price', 5, 2)->nullable()->default(00.00);
            $table->integer('stock')->default(0);
            $table->bigInteger('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ktp');
    }
}
