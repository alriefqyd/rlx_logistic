<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('stt');
            $table->string('noReferensiExternal');
            $table->string('invoice');
            $table->integer('destination');
            $table->integer('origin');
            $table->string('senderName');
            $table->string('recipientName');
            $table->text('addressSender');
            $table->text('addressRecipient');
            $table->string('transaction_type');
            $table->foreignId('created_by');
            $table->string('phone_sending_by');
            $table->string('phone_recipient');
            $table->foreignId('layanan_id');
            $table->string('komoditas');
            $table->string('asuransi_pengiriman');
            $table->string('npwp');
            $table->bigInteger('sending_price');
            $table->bigInteger('harga');
            $table->foreignId('company_sender')->nullable();
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
        Schema::dropIfExists('deliveries');
    }
}
