<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVertuError extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vertu_error', function (Blueprint $table) {
            $table->increments('id');
            $table->string('error');
            $table->string('repair_description');
            $table->string('price');
            $table->string('warranty');
            $table->string('blog_url');
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
        Schema::drop('vertu_error');
    }
}
