<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_requirements', function (Blueprint $table) {
            $table->id();

            $table->boolean('windows');
            $table->string('pc_recommended');
            $table->string('pc_minimum');

            $table->boolean('linux');
            $table->string('linux_recommended');
            $table->string('linux_minimum');

            $table->boolean('mac');
            $table->string('mac_recommended');
            $table->string('mac_minimum');
            
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
        Schema::dropIfExists('game_requirements');
    }
}
