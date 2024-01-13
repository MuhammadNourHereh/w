<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('cart_item', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customers');
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
        Schema::dropIfExists('cart_item');
    }
}
