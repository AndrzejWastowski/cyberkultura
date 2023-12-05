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
        Schema::create('addons_location', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id', true);
            $table->string('name', 50)->default('0');
            $table->integer('x')->default(0);
            $table->integer('y')->default(0);
            $table->integer('limited')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addons_location');
    }
};
