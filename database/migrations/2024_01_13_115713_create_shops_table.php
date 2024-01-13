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
            $table->id('shop_id');
            $table->unsignedBigInteger('shop_owner_id');
            $table->foreign('shop_owner_id')->references('shop_owner_id')->on('show_owners');
            $table->string('shop_name', 30);
            $table->string('location', 255)->nullable();
            $table->integer('phone_number')->nullable();
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
