<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->efficientUuid('id')->primary();
            $table->string('name')->comment('The players name');
            $table->smallInteger('type')->comment('The user type 0 - Observer / 1 - Player');
            $table->efficientUuid('room_id')->index()->comment('The room id the player is in');
            $table->dateTime('created_at')->useCurrent()->comment('The datetime the player was created');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
