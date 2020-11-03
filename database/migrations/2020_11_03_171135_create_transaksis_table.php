<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Transaksi', function (Blueprint $table) {
            $table->integerIncrements("transaksi_id");
            $table->integer("user_id")->unsigned();
            $table->integer("apartment_id")->unsigned();
            $table->integer("transaksi_status")->default(0);
            $table->dateTime("transaksi_tanggal_beli");
            $table->dateTime("transaksi_tanggal_selesai");
            $table->integer("transaksi_total_harga");

            $table->foreign("user_id")->references("user_id")->on("User");
            $table->foreign("apartment_id")->references("apartment_id")->on("Apartment");

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
        Schema::dropIfExists('transaksis');
    }
}
