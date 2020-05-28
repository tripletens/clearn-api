@extends('layouts.app')

@section('content')
<div class="row">
    <br><br><br>
    <div class="col-md-9">
    <a href="/posts" class="btn btn-secondary btn-lg btn-primary">Go Back</a>
        <h1>{{$post->title}}</h1>
        <video style="width:100%" controls>
            <source src="{{ asset('/storage/videos/' .$post->video )}}" type="video/mp4">
        </video>
        <br><br>
        <div>
            {{$post->description}}
        </div>
        <hr>
        <small>Written on {{$post->created_at}} by {{$post->user->name}} </small>
        <hr>
        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a>

                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
            @endif
        @endif
    </div>
    <div class="col-md-3">
        @include('const.rightbar')
    </div>
</div>
@endsection
