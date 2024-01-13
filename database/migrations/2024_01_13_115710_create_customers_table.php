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
            $table->id('customer_id');
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('email', 30)->unique();
            $table->string('password', 255);
            $table->enum('gender', ['MALE', 'FEMALE', 'UNSPECIFIED']);
            $table->date('date_of_birth')->nullable();
            $table->integer('phone_number')->nullable();
            $table->float('balance')->default(0);
            $table->string('location', 255)->nullable();
            $table->rememberToken();
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
