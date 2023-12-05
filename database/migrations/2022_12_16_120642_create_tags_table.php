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
        Schema::create('tags', function (Blueprint $table) {
            $table->comment('');
            $table->id();
            $table->string('tag', 50)->nullable();
            $table->enum('color', ['badge-default', 'badge-primary', 'badge-secondary', 'badge-success', 'badge-danger', 'badge-warning', 'badge-info'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
};
