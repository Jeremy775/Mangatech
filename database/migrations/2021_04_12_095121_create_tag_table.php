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



        Schema::create('cour_tag', function (Blueprint $table) {
            $table->integer('cour_id');
            $table->foreign('cour_id')->references('id')->on('cours');

            $table->integer('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');

            $table->primary(['cour_id', 'tag_id']);
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
        Schema::dropIfExists('cour_tag');
    }
}
