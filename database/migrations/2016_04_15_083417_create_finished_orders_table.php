<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinishedOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finished_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('startTime');
            $table->dateTime('endTime');
            $table->text('origin');
            $table->text('destination');
            $table->double('distance', 10, 3);
            $table->string('contact', 15);
            $table->integer('fare');
            $table->integer('rating')->default(0);
            $table->string('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('finished_orders');
    }
}
