<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workspaces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['desk', 'office', 'meeting_room']);
            $table->text('description')->nullable();
            $table->decimal('price_per_hour', 8, 2);
            $table->decimal('price_per_day', 8, 2);
            $table->integer('capacity')->default(1);
            $table->string('image')->nullable();
            $table->boolean('is_available')->default(true);
            $table->json('amenities')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workspaces');
    }
};
