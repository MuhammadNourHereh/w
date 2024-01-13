<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('shop_owners', function (Blueprint $table) {
            $table->id('shop_owner_id');
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('email', 30);
            $table->enum('gender', ['MALE', 'FEMALE', 'UNSPECIFIED']);
            $table->date('date_of_birth')->nullable();
            $table->integer('phone_number')->nullable();
            $table->string('location', 255)->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('show_owners');
    }
}
