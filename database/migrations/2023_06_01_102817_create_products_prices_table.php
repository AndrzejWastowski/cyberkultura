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
        Schema::create('products_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('products_id');
            $table->integer('min_quantity');
            $table->integer('max_quantity');
            $table->decimal('price_per_unit', 8, 2);
            // Dodaj inne pola, które chcesz przechowywać dla cennika
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_prices');
    }
};
