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
        Schema::table('games', function (Blueprint $table) {
            $table->foreignId('details_id')->constrained('game_details')->after('id')->nullable()->unique();
            $table->foreignId('pricing_id')->constrained('game_pricing')->after('details_id')->nullable()->unique();
            $table->foreignId('requirements_id')->constrained('game_requirements')->after('pricing_id')->nullable()->unique();
        });

        Schema::table('game_details', function (Blueprint $table) {
            $table->foreignId('game_id')->constrained('games')->after('id');
        });

        Schema::table('game_pricing', function (Blueprint $table) {
            $table->foreignId('game_id')->constrained('games')->after('id');
        });

        Schema::table('game_requirements', function (Blueprint $table) {
            $table->foreignId('game_id')->constrained('games')->after('id');
        });

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
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn('details_id');
            $table->dropColumn('pricing_id');
            $table->dropColumn('requirements_id');
        });
        
        Schema::table('game_details', function (Blueprint $table) {
            $table->dropColumn('game_id');
        });
        
        Schema::table('game_pricing', function (Blueprint $table) {
            $table->dropColumn('game_id');
        });
        
        Schema::table('game_requirements', function (Blueprint $table) {
            $table->dropColumn('game_id');
        });
        
        Schema::table('game_videos', function (Blueprint $table) {
            $table->dropColumn('game_id');
        });
        
        Schema::table('game_images', function (Blueprint $table) {
            $table->dropColumn('game_id');
        });
    }
}
