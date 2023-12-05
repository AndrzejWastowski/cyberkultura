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
        Schema::create('products_category_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('products_category_id');
            $table->string('locale');
            $table->string('name');
            $table->timestamps();
            $table->foreign('products_category_id')->references('id')->on('products_category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_category_translations');
    }
};
