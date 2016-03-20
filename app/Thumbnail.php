<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
    public function scene()
    {
        return $this->belongsTo('App\Scene');
    }
}
