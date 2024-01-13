<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('show_owners', function (Blueprint $table) {
            $table->increments('shop_owner_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender');
            $table->dateTime('date_of_birth')->nullable();
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
        Schema::dropIfExists('show_owners');
    }
}
