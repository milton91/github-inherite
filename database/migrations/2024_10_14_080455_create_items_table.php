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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('seller');
            $table->string('category');
            $table->string('location');
            $table->decimal('price', 15, 2); // Specify precision and scale if needed
            $table->decimal('rating', 3, 2)->nullable(); // Allows for up to 5.00 rating
            $table->text('description');
            $table->string('image')->nullable(); // Make image field nullable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};

