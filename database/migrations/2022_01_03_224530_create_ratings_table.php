<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function(Blueprint $table) {
            $table->id('rating_id');
            $table->unsignedDecimal('note', 2, 2)->nullable(false);
            $table->string('comment', 255)->nullable();
            $table->integer('user_id')->nullable(false);
            $table->integer('place_id')->nullable(false);
            $table->timestamps();

            $table->foreign('user_id', 'fk_ratings_users')->references('user_id')->on('users');
            $table->foreign('place_id', 'fk_ratings_places')->references('place_id')->on('places');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
