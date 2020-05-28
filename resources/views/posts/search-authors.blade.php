@extends('layouts.app')

@section('content')
    {{--  <h1>Posts</h1>  --}}

    <div class="row">
        <div class="row col-md-9">
            @if(count($authors) > 0)

                    @foreach($authors as $post)

                        <div class="col-md-4 col-xs-12 card card-body bg-light my-2 " style="margin:10px;margin-right:40px; width:100%;">

                            <h3><a href="{{route('users.show',$post->id)}}">{{$post->name}}</a></h3>
                            <small>Joined on {{$post->created_at}} </small>
                            {{--  <a href="{{route('user.videos')}}" style="text-decoration:none; margin-top:80%">View Author's Videos</a>  --}}
                        </div>
                    @endforeach

                {{$authors->links()}}
            @else
                <p>No Result found</p>

            @endif
        </div>

        <div class="col-md-3">
            @include('const.rightbar')
        </div>
    </div>
@endsection
