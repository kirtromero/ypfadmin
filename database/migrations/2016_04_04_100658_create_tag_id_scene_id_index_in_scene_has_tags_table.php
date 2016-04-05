<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagIdSceneIdIndexInSceneHasTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scene_has_tags', function (Blueprint $table) {
            $table->index('scene_id');
            $table->index('tag_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scene_has_tags', function (Blueprint $table) {
            //
        });
    }
}
