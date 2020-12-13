<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_location', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('location_title');
            $table->string('address');
            $table->string('phn_no');
            $table->string('lat');
            $table->string('lng');
            $table->string('open_close_time');
            $table->integer('pick_up');
            $table->integer('delivery');
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
        Schema::dropIfExists('shop_location');
    }
}
