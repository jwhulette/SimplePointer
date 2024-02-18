<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table): void {
            $table->uuid()->primary();
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
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
