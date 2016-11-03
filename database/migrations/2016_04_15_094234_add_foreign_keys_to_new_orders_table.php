<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToNewOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('new_orders', function (Blueprint $table) {
            $table->integer('taxiDriverId')->unsigned();
            $table->foreign('taxiDriverId')->references('id')->on('taxi_drivers');

            $table->integer('taxiOperatorUserId')->unsigned()->nullable();
            $table->foreign('taxiOperatorUserId')->references('id')->on('taxi_operators');

            $table->integer('taxiTypeId')->unsigned();
            $table->foreign('taxiTypeId')->references('id')->on('taxi_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('new_orders', function (Blueprint $table) {
            $table->dropForeign("new_orders_taxitypeid_foreign");
            $table->dropForeign("new_orders_taxidriverid_foreign");
            $table->dropForeign("new_orders_taxioperatoruserid_foreign");
        });
    }
}
