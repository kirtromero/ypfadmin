<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scene extends Model
{
    use SoftDeletes;

    public function site()
    {
        return $this->hasOne('App\Site');
    }

    public function affiliate()
    {
        return $this->hasOne('App\Affiliate');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Tag','scene_has_tags');
    }

    public function thumbnail()
    {
        return $this->hasMany('App\Thumbnail');
    }
}
