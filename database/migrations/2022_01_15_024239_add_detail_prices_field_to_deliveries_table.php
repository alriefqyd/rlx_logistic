<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailPricesFieldToDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deliveries', function (Blueprint $table) {
            $table->integer('total_packet');
            $table->integer('actual_weight');
            $table->bigInteger('insurance');
            $table->bigInteger('ppn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deliveries', function (Blueprint $table) {
            $table->dropColumn('total_packet');
            $table->dropColumn('actual_weight');
            $table->dropColumn('insurance');
            $table->dropColumn('ppn');
        });
    }
}
