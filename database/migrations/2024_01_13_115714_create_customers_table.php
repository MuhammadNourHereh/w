<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('customers', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('email');
            $table->enum('gender', ['MALE', 'FEMALE', 'UNSPECIFIED']);
            $table->integer('phone_number')->nullable();
            $table->float('balance')->default(0);
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
        Schema::dropIfExists('customers');
    }
}
