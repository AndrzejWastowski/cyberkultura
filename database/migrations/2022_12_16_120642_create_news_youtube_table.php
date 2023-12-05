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
        Schema::create('news_youtube', function (Blueprint $table) {
            $table->comment('');
            $table->id();
            $table->string('link_youtube', 150)->nullable();
            $table->integer('news_id')->index('news_id');
            $table->dateTime('date_add')->useCurrent();
            $table->boolean('deleted')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_youtube');
    }
};
