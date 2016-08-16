    <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomerDetailsToNewordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('new_orders', function (Blueprint $table) {
            $table->dropColumn('oneSignalUserId');
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
        Schema::table('new_orders', function (Blueprint $table) {
            $table->dropForeign("new_orders_customerid_foreign");
        });
    }
}
