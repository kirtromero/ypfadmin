<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSceneHasTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scene_has_tags', function (Blueprint $table) {
            $table->integer('scene_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->foreign('scene_id')->references('id')->on('scenes');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('scene_has_tags');
    }
}
