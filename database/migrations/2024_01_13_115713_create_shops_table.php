<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('shops', function (Blueprint $table) {
            $table->increments('shop_id');
            $table->integer('shop_owner_id');
            $table->foreign('shop_owner_id')->references('shop_owner_id')->on('show_owners');
            $table->string('name');
            $table->string('location');
            $table->string('phone_number')->nullable();
            $table->string('email');
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
        Schema::dropIfExists('shops');
    }
}
