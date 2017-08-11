@extends('site.app')
@section('bg-img',Storage::disk('local')->url($slug->image))
@section('heading',$slug->title)
@section('sub-title',$slug->subtitle)
@section('main-content')
<article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                  <small>Created at {{$slug->created_at->diffForHumans()}}</small>
                    @foreach($slug->categories as $category)
                        <small class="pull-right" style="margin:10px">
                        {{$category->name}}
                        </small>
                    @endforeach
                  {!! htmlspecialchars_decode($slug->body) !!}
                    <h3>Cloud Tags</h3>
                    @foreach($slug->tags as $tag)
                        <small class="pull-left" style="margin:10px; border-radius:5px; border:1px solid gray; padding:5px">
                            {{$tag->name}}
                        </small>
                    @endforeach
                </div>
            </div>
        </div>
</article>

    <hr>
@endsection