<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
        }); 



        Schema::create('anime_tag', function (Blueprint $table) {
            $table->integer('anime_id');
            $table->foreign('anime_id')->references('id')->on('animes');

            $table->integer('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');

            $table->primary(['anime_id', 'tag_id']);
        });

        Schema::create('manga_tag', function (Blueprint $table) {
            $table->integer('manga_id');
            $table->foreign('manga_id')->references('id')->on('mangas');

            $table->integer('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');

            $table->primary(['manga_id', 'tag_id']);
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
        Schema::dropIfExists('anime_tag');
    }
}
