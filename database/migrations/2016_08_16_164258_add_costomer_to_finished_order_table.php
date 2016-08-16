<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCostomerToFinishedOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('finished_orders', function (Blueprint $table) {
            $table->integer('customerId')->unsigned();
            $table->foreign('customerId')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('finished_orders', function (Blueprint $table) {
            $table->dropForeign("finished_orders_customerid_foreign");
        });
    }
}
