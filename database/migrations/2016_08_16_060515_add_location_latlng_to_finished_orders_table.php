<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLocationLatlngToFinishedOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('finished_orders', function (Blueprint $table) {
            $table->double('originLatitude', 8, 6);
                $table->double('originLongitude', 9, 6);
            $table->double('destinationLatitude', 8, 6);
            $table->double('destinationLongitude', 9, 6);
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
            $table->dropColumn(array('originLatitude', 'originLongitude', 'destinationLatitude', 'destinationLongitude'));
        });
    }
}
