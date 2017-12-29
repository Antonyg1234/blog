<?php

namespace App\Http\Controllers\site;

use App\Model\site\post;
use App\Http\Controllers\Controller;

class postController extends Controller
{
    public function posts(post $slug)
    {
        //return $slug->categories['name'];
        return view('site/post',compact('slug'));
    }
}
