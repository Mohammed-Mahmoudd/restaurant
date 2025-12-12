<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                ->constrained('categories')  // references id on categories table
                ->onDelete('cascade');       // optional: delete meals when category is deleted

            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);   // e.g., 999,999.99 max
            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
