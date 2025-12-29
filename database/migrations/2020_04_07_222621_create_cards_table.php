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
        Schema::create('cards', function (Blueprint $table): void {
            $table->tinyIncrements('id');
            $table->string('description', 100)->comment('The card sets description');
            $table->mediumText('card_set')->comment('The card vaules stored as json');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
