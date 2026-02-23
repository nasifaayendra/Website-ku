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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Relasi ke users
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained('users')
                  ->cascadeOnDelete();

            // Relasi ke categories
            $table->foreignId('category_id')
                  ->nullable()
                  ->constrained('categories')
                  ->cascadeOnDelete();

            // Relasi ke suppliers
            $table->foreignId('supplier_id')
                  ->nullable()
                  ->constrained('suppliers')
                  ->cascadeOnDelete();

            $table->string('product_name');
            $table->string('slug')->unique();
            $table->string('merk');
            $table->text('description')->nullable();
            $table->string('image');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
