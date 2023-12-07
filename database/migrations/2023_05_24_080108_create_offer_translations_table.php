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
        Schema::create('offers_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offers_id');
            $table->string('locale', 2);
            $table->string('name')->unique('name');;
            $table->string('link')->unique('link');
            $table->string('short_description');
            $table->text('lead')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('offers_id')
                  ->references('id')
                  ->on('offers')
                  ->onDelete('cascade')
                  ->onUpdate('restrict');

            $table->index('offers_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers_translations');
    }
};
