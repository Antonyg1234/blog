<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\site\post;
use App\Model\site\category;
use App\Model\site\tag;
use App\Model\admin\admin;
use App\Model\site\post_user;
//use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function index()
    {
        $posts=post::where('status',1)->paginate(2);
        $likes=post_user::all();
        return view('site.home',compact('posts','likes'));
    }

    public function tag(tag $tag)
    {
        return $tag;
        return $tag->posts;
    }

    public function category(category $category)
    {
        return $category;
        return $category->posts;
    }

    public function likes(Request $request)
    {
        $user_id=Auth::id();
        $post_like=post_user::where('user_id',$user_id)->where('post_id',$request->id)->count();
        if($post_like==0) {
            post::where('id',$request->id)->increment('likes',1);
            post_user::insert(['user_id' => $user_id,'post_id'=>$request->id]);
        }else{
            post::where('id',$request->id)->decrement('likes',1);
            post_user::where('post_id',$request->id)->delete();
        }
        $likes=post::where('id',$request->id)->value('likes');
        return $likes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
