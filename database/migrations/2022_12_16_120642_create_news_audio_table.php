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
        Schema::create('news_audio', function (Blueprint $table) {
            $table->comment('');
            $table->id();
            $table->string('filename', 250)->nullable();
            $table->integer('news_id')->index('news_id');
            $table->integer('users_id')->index('users_id');
            $table->dateTime('date_add')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_audio');
    }
};
