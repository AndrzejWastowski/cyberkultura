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
        Schema::create('news_comments', function (Blueprint $table) {
            $table->comment('');
            $table->id();
            $table->integer('news_id')->index('wiadomosc_id');
            $table->dateTime('date_add');
            $table->string('coockies_id', 32);
            $table->string('signature', 50);
            $table->text('content');
            $table->boolean('deleted')->default(false);
            $table->integer('users_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_comments');
    }
};
