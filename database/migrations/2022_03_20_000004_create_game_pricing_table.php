<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamePricingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_pricing', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_free');
            $table->integer('current_steam_price');
            $table->integer('current_gog_price');
            $table->integer('current_epic_price');
            $table->integer('best_price');
            $table->integer('best_store');
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
        Schema::dropIfExists('game_pricing');
    }
}
