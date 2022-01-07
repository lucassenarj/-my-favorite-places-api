<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function(Blueprint $table) {
            $table->id('place_id');
            $table->string('title')->nullable(false);
            $table->string('slug')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('latitude', 15)->nullable(false);
            $table->string('longitude', 15)->nullable(false);
            $table->longText('description')->nullable();
            $table->string('visited_at')->nullable();
            $table->string('thumbnail')->nullable();
            $table->boolean('shared')->default(0)->nullable(false);
            $table->integer('user_id')->nullable(false);
            $table->timestamps();

            $table->foreign('user_id', 'fk_places_users')->references('user_id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
