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
        Schema::create('gallery_photos', function (Blueprint $table) {
            
            $table->id();
            $table->comment('');
            $table->integer('gallery_id')->nullable();
            $table->tinyInteger('top_photo')->default(0);
            $table->string('signature', 250)->nullable();
            $table->unsignedInteger('users_id')->index('users_id');
            $table->dateTime('date_add')->nullable()->useCurrent();
            $table->integer('sorting')->default(0);
            $table->enum('extension', ['jpg', 'png', 'gif'])->nullable()->default('jpg');
            $table->string('author', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_photos');
    }
};
