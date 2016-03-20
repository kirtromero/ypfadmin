<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scene_has_tag extends Model
{

	protected $table = 'scene_has_tags';

    public function scene()
    {
        return $this->belongsTo('App\Scene');
    }

    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }
}
