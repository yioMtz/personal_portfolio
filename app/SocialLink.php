<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
     /**
     * Get the bio that owns the socil link.
     */
    public function bio()
    {
        return $this->belongsTo('App\Bio');
    }
}
