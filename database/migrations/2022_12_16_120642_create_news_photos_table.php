<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_photos', function (Blueprint $table) {
            $table->comment('');
            $table->id();
            $table->string('name', 150)->nullable();
            $table->unsignedInteger('news_id')->index('news_id');
            $table->unsignedInteger('users_id')->default(0)->index('users_id');
            $table->string('signature', 50)->default('0');
            $table->enum('location', ['lid', 'tresc', 'plakat_lid', 'plakat_tresc'])->default('tresc');
            $table->enum('extension', ['png', 'jpg', 'gif', 'webp'])->default('jpg');
            $table->dateTime('date_add')->useCurrent();
            $table->integer('sorting')->default(0);
            $table->integer('top_photo')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_photos');
    }
};
