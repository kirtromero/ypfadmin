<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scene_has_thumbnail extends Model
{
    protected $table = 'scene_has_thumbnails';

    public function scene()
    {
        return $this->belongsTo('App\Scene');
    }

    public function thumbnail()
    {
        return $this->belongsTo('App\Thumbnail');
    }
}
