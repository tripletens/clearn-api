@extends('layouts.app')

@section('content')
    {{--  <h1>Posts</h1>  --}}

    <div class="row">
        <div class="row col-md-9">
            @if(count($posts) > 0)

                    @foreach($posts as $post)

                        <div class="col-md-4 col-xs-12 card card-body bg-light" style="margin:10px;margin-right:40px;">
                            <div>
                                <video style="width:100%;" controls>
                                    <source src="{{ asset('/storage/videos/' .$post->video )}}" type="video/mp4">
                                </video>
                            </div>
                            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                            <small>Written on {{$post->created_at}} by {{$post->user->name}} </small>
                        </div>
                    @endforeach

                {{$posts->links()}}
            @else
                <p>No posts found</p>

            @endif
        </div>

        <div class="col-md-3">
            @include('const.rightbar')
        </div>
    </div>
@endsection
