<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function(Blueprint $table) {
            $table->id('photo_id');
            $table->string('title')->nullable(false);
            $table->string('path')->nullable(false);
            $table->longText('comment')->nullable();
            $table->integer('user_id')->nullable(false);
            $table->integer('place_id')->nullable(false);
            $table->timestamps();

            $table->foreign('user_id', 'fk_photos_users')->references('user_id')->on('users');
            $table->foreign('place_id', 'fk_photos_places')->references('place_id')->on('places');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
