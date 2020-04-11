<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->efficientUuid('uuid')->primary();
            $table->string('name')->comment('The room name');
            $table->tinyInteger('card_id')->comment('The id of the card set the table uses');
            $table->dateTime('last_used_at')->useCurrent()->comment('The last time the someone entered the room');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
