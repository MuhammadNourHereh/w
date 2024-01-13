<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('order_item', function (Blueprint $table) {
            $table->increments('order_id');
            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->integer('item_id')->primary();
            $table->foreign('item_id')->references('item_id')->on('items');
            $table->integer('quantity');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_item');
    }
}
