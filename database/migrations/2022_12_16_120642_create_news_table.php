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
        Schema::create('news', function (Blueprint $table) {
            $table->comment('');
            $table->id();
            $table->integer('news_category_id')->index('news_category_id');
            $table->string('title', 250);
            $table->text('lead');
            $table->text('content')->nullable();
            $table->dateTime('date_publication');
            $table->dateTime('date_add')->useCurrent();
            $table->dateTime('date_end');
            $table->string('signature', 50)->nullable();
            $table->text('note')->nullable();
            $table->string('note_source', 250)->nullable()->default('');
            $table->string('note_source_link', 250)->nullable()->default('');
            $table->text('addition')->nullable();
            $table->text('addition_source')->nullable();
            $table->integer('users_id')->default(0)->index('users_id');
            $table->tinyInteger('top')->default(0);
            $table->tinyInteger('comments')->default(0);
            $table->smallInteger('comments_count')->default(0);
            $table->tinyInteger('deleted')->default(0);
            $table->tinyInteger('hidden')->default(0);
            $table->tinyInteger('forum')->default(0);
            $table->tinyInteger('facebook')->default(0);
            $table->tinyInteger('print')->default(0);
            $table->enum('ln', ['pl', 'en'])->default('pl');
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
        Schema::dropIfExists('news');
    }
};
