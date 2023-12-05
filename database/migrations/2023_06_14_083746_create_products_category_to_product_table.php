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
        Schema::create('products_category_to_product', function (Blueprint $table) {
            $table->unsignedBigInteger('products_category_id');
            $table->unsignedBigInteger('products_id');
            $table->timestamps();

            $table->foreign('products_category_id')->references('id')->on('products_category')->onDelete('cascade');
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');

            $table->primary(['products_category_id', 'products_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_category_to_product');
    }
};
