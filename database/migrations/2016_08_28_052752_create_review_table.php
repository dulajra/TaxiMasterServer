<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('driver_id')->unsigned();
            $table->integer('rating');
            $table->string('review_desc',1024);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('driver_id')->references('id')->on('taxi_drivers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reviews');
    }
}
