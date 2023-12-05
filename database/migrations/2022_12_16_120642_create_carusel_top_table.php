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
        Schema::create('carusel_top', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id', true)->index('id');
            $table->string('signature', 250)->nullable();
            $table->string('postscript', 250)->nullable();
            $table->string('link', 512)->nullable();
            $table->string('plik_org', 512)->nullable();
            $table->dateTime('date_add')->nullable();
            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_stop')->nullable();
            $table->enum('ext', ['jpg', 'png'])->nullable();
            $table->tinyInteger('hidden')->nullable()->default(0);
            $table->string('dimensions', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carusel_top');
    }
};
