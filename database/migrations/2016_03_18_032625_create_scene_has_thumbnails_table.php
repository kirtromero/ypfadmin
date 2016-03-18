<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSceneHasThumbnailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scene_has_thumbnails', function (Blueprint $table) {
            $table->integer('scene_id')->unsigned();
            $table->integer('thumbnail_id')->unsigned();

            $table->foreign('scene_id')->references('id')->on('scenes');
            $table->foreign('thumbnail_id')->references('id')->on('thumbnails');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('scene_has_thumbnails');
    }
}
