<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Apartment', function (Blueprint $table) {
            $table->integerIncrements("apartment_id");
            $table->integer("user_id")->unsigned();
            $table->integer("tipe_apartment_id")->unsigned();
            $table->integer("kategori_id")->unsigned();
            $table->integer("negara_id")->unsigned();
            $table->integer("kota_id")->unsigned();
            $table->string("apartment_nama",255);
            $table->integer("apartment_harga");
            $table->string("apartment_alamat",255);
            $table->longText("apartment_deskripsi");
            $table->float("apaartment_rating");
            $table->integer("apartment_status")->default(0);
            $table->string("apartment_foto",255);
            $table->integer("apartment_tahun_bangun");

            $table->foreign("user_id")->references("user_id")->on("User");
            $table->foreign("tipe_apartment_id")->references("tipe_apartment_id")->on("Tipe_apartment");
            $table->foreign("kategori_id")->references("kategori_id")->on("Kategori");
            $table->foreign("negara_id")->references("negara_id")->on("Negara");
            $table->foreign("kota_id")->references("kota_id")->on("Kota");
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
        Schema::dropIfExists('apartments');
    }
}
