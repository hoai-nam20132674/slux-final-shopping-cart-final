<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custumer_register', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dong');
            $table->string('message');
            $table->string('error');
            $table->string('name');
            $table->string('phone_number');
            $table->integer('status');
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
        Schema::drop('custumer_register');
    }
}
