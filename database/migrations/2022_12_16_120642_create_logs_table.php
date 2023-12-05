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
        Schema::create('logs', function (Blueprint $table) {
            $table->comment('');
            $table->id();
            $table->enum('action', ['logowanie', 'wylogowanie', 'dodanie', 'edycja', 'ukrycie', 'usuniecie'])->default('logowanie');
            $table->enum('section', ['brak', 'carusel_top', 'equipment', 'equipment_photos', 'gallery', 'gallery_category', 'logs', 'menu_day', 'menu_day_category', 'menu_day_date', 'menu_top', 'news', 'news_attachments', 'news_audio', 'news_category', 'news_comments', 'news_photos', 'news_youtubes', 'pages', 'pricing', 'reference', 'tags', 'users'])->nullable();
            $table->string('description', 250)->default('');
            $table->unsignedInteger('index_id')->nullable();
            $table->dateTime('data')->useCurrent();
            $table->unsignedInteger('users_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
};
