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
        Schema::create('offers_comments', function (Blueprint $table) {

            $table->id();
            $table->integer('offers_id')->index('news_id');
            $table->dateTime('date_add');
            $table->string('coockies_id', 32);
            $table->string('signature', 50);
            $table->text('content');
            $table->integer('rating')->nullable();
            $table->boolean('visibility')->default(0);
            $table->boolean('deleted')->default(false);
            $table->integer('users_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers_comments');
    }
};
