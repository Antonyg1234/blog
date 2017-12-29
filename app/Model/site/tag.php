<?php

namespace App\Model\site;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Model\site\tag','post_tags');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
   
}
