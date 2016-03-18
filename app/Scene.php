<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scene extends Model
{
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
        return $this->hasMany('App\Tag');
    }

    public function thumbnail()
    {
        return $this->hasMany('App\Thumbnails');
    }
}
