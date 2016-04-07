<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feed extends Model
{
	use SoftDeletes;

    public function affiliate()
    {
        return $this->belongsTo('App\Affiliate');
    }
}
