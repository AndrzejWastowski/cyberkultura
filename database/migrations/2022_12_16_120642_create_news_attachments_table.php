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
        Schema::create('news_attachments', function (Blueprint $table) {
            $table->comment('');
            $table->id();
            $table->dateTime('date_publication')->nullable()->useCurrent();
            $table->integer('news_id')->nullable()->index('news_id');
            $table->string('filename', 250)->default('');
            $table->string('filename_org', 250)->default('');
            $table->text('description')->nullable();
            $table->string('filename_text', 250)->nullable();
            $table->enum('extension', ['brak', 'pdf', 'doc', 'odt', 'xls', 'docx'])->default('brak');
            $table->integer('users_id')->default(0)->index('users_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_attachments');
    }
};
