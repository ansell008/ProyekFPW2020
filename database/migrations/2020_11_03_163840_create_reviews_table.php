<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Review', function (Blueprint $table) {
            $table->integerIncrements("review_id");
            $table->integer("user_id")->unsigned();
            $table->integer("apartment_id")->unsigned();
            $table->float("review_rate");
            $table->longText("review_isi");

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
        Schema::dropIfExists('reviews');
    }
}
