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
        Schema::create('statictics_day', function (Blueprint $table) {
            $table->comment('');
            $table->id();
            $table->date('data')->nullable();
            $table->integer('visit')->nullable()->default(1);
            $table->integer('refresh')->nullable()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statictics_day');
    }
};
