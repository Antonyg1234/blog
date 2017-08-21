<?php

namespace App\Model\site;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Model\site\post','category_posts');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}


