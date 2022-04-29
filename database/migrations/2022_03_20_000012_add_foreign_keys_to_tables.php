<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('game_videos', function (Blueprint $table) {
            $table->foreignId('game_id')->constrained('games')->after('id');
        });

        Schema::table('game_images', function (Blueprint $table) {
            $table->foreignId('game_id')->constrained('games')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('game_videos', function (Blueprint $table) {
            $table->dropColumn('game_id');
        });
        
        Schema::table('game_images', function (Blueprint $table) {
            $table->dropColumn('game_id');
        });
    }
}
