@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-secondary">Go Back</a>
    <div class="row">
        <h1>{{$user->title}}</h1>
        <div class=" row col-md-9 card card-body bg-light my-2 " style="margin-top:7px;margin-right:5px;">
            <h3><a href="{{route('users.show',$user->id)}}">{{$user->name}}</a></h3>
            <h5>All {{ count($user->posts) }} Videos </h5>
            <small>Joined on {{$user->created_at}} </small>
                @if(count($user->posts) > 0 )
                @foreach($user->posts as $item)
                    <div class="col-md-12 col-xs-12 card-body bg-light " >
                        <div>
                            <video style="width:100%" controls>
                                <source src="/storage/videos/{{$item->video}}" type="video/mp4">
                            </video>
                        </div>
                        <h3><a href="/posts/{{$item->id}}">{{$item->title}}</a></h3>
                        <small>Written on {{$item->created_at}} by {{$item->user->name}} </small>
                    </div>
                @endforeach
            @else
                No Videos
            @endif
            </div>
        </div>
        {{--  <div class="col-md-3">
            @include('const.rightbar')
        </div>  --}}
    </div>
@endsection
