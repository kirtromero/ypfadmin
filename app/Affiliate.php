<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    public function scene()
    {
        return $this->belongsTo('App\Scene');
    }

    public function feeds()
    {
        return $this->hasMany('App\Feed');
    }
}
