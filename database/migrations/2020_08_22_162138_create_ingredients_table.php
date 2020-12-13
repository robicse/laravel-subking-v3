<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('side_category_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->integer('price_status');
            $table->float('price', 8, 2);
            $table->string('image');
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->foreign('side_category_id')->references('id')->on('side_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}
