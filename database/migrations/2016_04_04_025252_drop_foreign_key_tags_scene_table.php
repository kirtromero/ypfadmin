<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropForeignKeyTagsSceneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scene_has_tags', function (Blueprint $table) {
            $table->dropForeign('scene_has_tags_scene_id_foreign');
            $table->dropForeign('scene_has_tags_tag_id_foreign');
        });

        Schema::table('scene_has_tags', function (Blueprint $table) {

            $table->foreign('scene_id')
            ->references('id')->on('scenes')
            ->onDelete('cascade');

            $table->foreign('tag_id')
            ->references('id')->on('tags')
            ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
