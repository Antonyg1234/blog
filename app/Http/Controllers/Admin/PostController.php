<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Model\site\post;
use App\Model\site\tag;
use App\Model\site\category;
//use App\Model\admin\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=post::all()->sortByDesc("id");
        return view('admin/posts/show',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.create')) {
            $tags=tag::all();
            $categories=category::all();
            return view('admin/posts/posts',compact('tags','categories'));
        }

        return redirect(route('post.index'));
    }

    public function slug(Request $request)
    {
        $slug = str_slug($request->slug, '-');
        return $slug;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'title' => 'required',
        'sub_title' => 'required',
        'slug' => 'required',
        'body' => 'required',
        'image' => 'required',
        ]);

        if($request->hasFile('image')){
            $imageName=$request->image->store('public');
        }

        $post=new post;
        $post->title=$request->title;
        $post->subtitle=$request->sub_title;
        $post->slug=$request->slug;
        $post->image= $imageName;
        $post->likes= 0;
        $post->body=$request->body;
        $post->status=$request->status;

        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::with('tag')->where('id',2)->get();
        // $post = post::find(2);
        // print_r($post);die;
        foreach ($post as $key => $value) {
            # code...
            print_r($value->tag->name);
        }die;
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('posts.update')) {
            $post = post::with('tags', 'categories')->where('id', $id)->first();
            $tags = tag::all();
            $categories = category::all();
            return view('admin/posts/edit', compact('post', 'tags', 'categories'));
        }

        return redirect(route('post.index'));

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
        $this->validate($request, [
            'title' => 'required',
            'sub_title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'required',
        ]);

        if($request->hasFile('image')){
            $imageName=$request->image->store('public');
        }

        $post=post::find($id);
        $post->title=$request->title;
        $post->subtitle=$request->sub_title;
        $post->slug=$request->slug;
        $post->body=$request->body;
        $post->image=$imageName;
        $post->status=$request->status;
       // $post->tags()->attach($request->tags);
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        $post->save();

        return redirect(route('post.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id',$id)->delete();
        return redirect()->back();
    }
}
