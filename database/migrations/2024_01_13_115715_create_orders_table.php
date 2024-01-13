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
        Schema::disableForeignKeyConstraints();

        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('customer_id')->on('customers');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->foreign('driver_id')->references('driver_id')->on('drivers');
            $table->enum('state',['pending', 'processing', 'assigning', 'shipping', 'delivered'])->default('pending');
            $table->timestamp('time_ordered')->nullable();
            $table->timestamp('time_processed')->nullable();
            $table->timestamp('time_assigned')->nullable();
            $table->timestamp('time_shipped')->nullable();
            $table->timestamp('time_delivered')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
