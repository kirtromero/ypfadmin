<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public function scene()
    {
        return $this->belongsToMany('App\Scene','scene_has_tags');
    }
}
