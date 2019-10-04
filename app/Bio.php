<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{
    /**
     * Get the social link for the bio.
     */
    public function links()
    {
        return $this->hasMany('App\SocialLink');
    }
}
