<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User', function (Blueprint $table) {
            $table->integerIncrements("user_id");
            $table->string("user_email",50);
            $table->string("user_password",100);
            $table->string("user_nama",50);
            $table->string("user_notelp",15);
            $table->integer("user_tipe"); // jika 0 maka penjual, 1 maka pembeli
            $table->string("user_photo",255);
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
        Schema::dropIfExists('users');
    }
}
