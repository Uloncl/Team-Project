<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('steam_id')->nullable()->unique();
            $table->unsignedInteger('gog_id')->nullable()->unique();
            $table->unsignedInteger('epic_id')->nullable()->unique();
            $table->string('type');
            $table->boolean('banned');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->longText('about')->nullable();
            $table->longText('languages')->nullable();
            $table->string('release_date')->nullable();
            $table->string('steam_url')->nullable();
            $table->String('gog_url')->nullable();
            $table->String('epic_url')->nullable();
            $table->integer('metacritic')->nullable();
            $table->string('metacritic_url')->nullable();
            $table->integer('recommendations')->nullable();
            $table->boolean('is_free');
            $table->integer('current_steam_price')->nullable();
            $table->integer('current_gog_price')->nullable();
            $table->integer('current_epic_price')->nullable();
            $table->integer('best_price')->nullable();
            $table->integer('best_store')->nullable();

            $table->boolean('windows')->nullable();
            $table->string('pc_recommended')->nullable();
            $table->string('pc_minimum')->nullable();

            $table->boolean('linux')->nullable();
            $table->string('linux_recommended')->nullable();
            $table->string('linux_minimum')->nullable();

            $table->boolean('mac')->nullable();
            $table->string('mac_recommended')->nullable();
            $table->string('mac_minimum')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
