<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('no_meja');
            $table->string('pelanggan');
            $table->unsignedBigInteger('id_food');
            $table->foreign('id_food')->references('id')->on('foods');
            $table->unsignedBigInteger('id_drink');
            $table->foreign('id_drink')->references('id')->on('drinks');
            $table->string('no_pesanan');
            $table->string('status');
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
        Schema::dropIfExists('orders');
    }
}
