<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Kota', function (Blueprint $table) {
            $table->integerIncrements("kota_id");
            $table->integer("negara_id")->unsigned();
            $table->foreign("negara_id")->references("negara_id")->on("Negara");
            $table->string("kota_nama",50);
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
        Schema::dropIfExists('kotas');
    }
}
