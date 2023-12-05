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
        Schema::create('gallery', function (Blueprint $table) {
            $table->comment('');
            $table->id();
            $table->string('name', 250)->nullable();
            $table->string('signature', 250)->nullable();
            $table->string('lead', 512)->nullable();
            $table->text('content')->nullable();
            $table->tinyInteger('author')->nullable();
            $table->integer('users_id')->index('users_id');
            $table->dateTime('date_add')->useCurrent();
            $table->dateTime('date_publication')->nullable();
            $table->integer('counter')->default(0);
            $table->integer('sorting')->default(0);
            $table->boolean('hidden')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery');
    }
};
