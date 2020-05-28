@extends('layouts.app')

@section('content')
    {{--  <h1>Posts</h1>  --}}

    <div class="row">
        <div class="row col-md-9">
            @if(count($videos) > 0)

                    @foreach($videos as $item)

                        <div class="col-md-4 col-xs-12 card card-body bg-light my-2 " style="margin:10px;margin-right:40px; width:100%;">
                            <div>
                                <video style="width:100%" controls>
                                    <source src="/storage/videos/{{$item->video}}" type="video/mp4">
                                </video>
                            </div>
                            <h3><a href="/posts/{{$item->id}}">{{$item->title}}</a></h3>
                            <small>Written on {{$item->created_at}} by {{$item->user->name}} </small>
                        </div>
                    @endforeach

                {{--  {{$videos->links()}}  --}}
            @else
                <p>No Result found</p>

            @endif
        </div>

        <div class="col-md-3">
            @include('const.rightbar')
        </div>
    </div>
@endsection
