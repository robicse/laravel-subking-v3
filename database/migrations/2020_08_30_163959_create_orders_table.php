<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('shipping_process');
            $table->longText('shipping_information');
            $table->string('coupon_discount_type')->nullable();
            $table->float('coupon_discount_amount', 8, 2)->default(0);
            $table->float('total_amount', 8, 2);
            $table->integer('pay_online')->default(0);
            $table->string('calculated_statement_descriptor')->nullable();
            $table->float('transaction_amount', 8, 2)->nullable();
            $table->float('transaction_amount_refunded', 8, 2)->nullable();
            $table->string('transaction_currency')->nullable();
            $table->longText('transaction_status')->nullable();
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
