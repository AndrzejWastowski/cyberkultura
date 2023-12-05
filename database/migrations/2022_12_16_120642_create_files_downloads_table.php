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
        Schema::create('files_downloads', function (Blueprint $table) {
            $table->id();
            $table->comment('');
            $table->string('name', 50)->nullable();
            $table->dateTime('date_add')->useCurrent();
            $table->dateTime('date_publication')->useCurrent();
            $table->dateTime('date_end')->nullable();
            $table->tinyInteger('top')->nullable();
            $table->string('filename_org', 150)->nullable();
            $table->string('filename', 150)->nullable();
            $table->string('description', 250)->nullable();
            $table->unsignedInteger('files_downloads_categories_id')->default(0);
            $table->enum('extension', ['pdf', 'doc', 'odt', 'xls', 'docx', 'zip', 'rar']);
            $table->boolean('hidden')->default(false);
            $table->enum('ln', ['pl', 'en'])->nullable()->default('pl');
            $table->integer('users_id')->default(0);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files_downloads');
    }
};
