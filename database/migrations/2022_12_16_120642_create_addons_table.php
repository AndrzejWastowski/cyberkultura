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
        Schema::create('addons', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id', true);
            $table->string('name', 50);
            $table->string('filename', 50);
            $table->integer('addons_location_id')->default(0);
            $table->integer('sorting')->default(0);
            $table->string('link', 512)->nullable();
            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_end');
            $table->integer('users_id');
            $table->integer('x');
            $table->integer('y');
            $table->integer('counter_view');
            $table->integer('counter');
            $table->enum('extension', ['jpg', 'swf', 'gif']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addons');
    }
};
