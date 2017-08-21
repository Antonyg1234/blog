@extends('site.app')
@section('bg-img','site/img/home-bg.jpg')
@section('heading','Clean Blog')
@section('main-content')
<!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @foreach($posts as $post)
                <div class="post-preview">

                    <a href="{{ url('posts/'.$post->slug) }}">
                        <h2 class="post-title">
                            {{$post->title}}
                        </h2>
                        <h3 class="post-subtitle">
                            {{$post->subtitle}}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> {{$post->created_at->diffForHumans()}}
                        <a href="javascript:void(0)" class="likes" data-id="{{$post->id}}"
                                data-user_id="{{Auth::id()}}"
                                data-liked="@foreach($likes as $like)
                                  @if(($like->post_id==$post->id) && ($like->user_id==Auth::id()))
                                    {{1}}
                                  @endif
                                @endforeach"
                                ><i id="like_color{{$post->id}}"

                                style="color:@foreach($likes as $like)
                                                 @if(($like->post_id==$post->id) && ($like->user_id==Auth::id()))
                                                     {{'green'}}
                                                 @endif
                                             @endforeach" class="fa fa-thumbs-up" aria-hidden="true"><span id="likes{{$post->id}}">({{$post->likes}})</span></i>
                        </a>
                    </p>

                </div>
                <hr>
                @endforeach
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        {{$posts->links()}}
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <hr>
@endsection