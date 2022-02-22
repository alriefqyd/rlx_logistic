<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveTotalBeratBiayaFieldToDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Deliveries', function (Blueprint $table) {
            $table->dropColumn('total_berat_dikenakan_biaya');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Deliveries', function (Blueprint $table) {
            $table->bigInteger('total_berat_dikenakan_biaya');
        });
    }
}
