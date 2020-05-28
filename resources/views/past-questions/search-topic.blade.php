@extends('layouts.app')

@section('content')
     <h1>Search Results</h1>

    <div class="row">
        <div class="row col-md-9">
            @if(count($topics) > 0)

                    @foreach($topics as $topic)

                        <div class="col-md-4 col-xs-12 card  bg-light" style="margin:10px;margin-right:40px; height:300px;padding:10px;">
                            <h4 class="text-center">Topic : {{strtoupper($topic->topic->title)}}</h4>
                                <div id="myCarousel{{$topic->id}}" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel{{$topic->id}}" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel{{$topic->id}}" data-slide-to="1"></li>
                                        <li data-target="#myCarousel{{$topic->id}}" data-slide-to="2"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active">
                                        <img src="/storage/past_questions_images/{{$topic->image1}}" alt="Past Question Image 1" style="height:auto;">
                                        </div>

                                        <div class="item">
                                        <img src="/storage/past_questions_images/{{$topic->image2}}" alt="Past Question Image 2">
                                        </div>

                                        <div class="item">
                                        <img src="/storage/past_questions_images/{{$topic->image3}}" alt="Past Question Image 3">
                                        </div>
                                    </div>

                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel{{$topic->id}}" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel{{$topic->id}}" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    </div>

                            <h3><a href="/past-questions/{{$topic->id}}">{{$topic->title}}</a></h3>
                            <a href="/storage/past_questions/{{$topic->pdf}}" download>Free pdf Download here</a>
                            <small>Written on {{$topic->created_at}} by {{$topic->user->name}} </small>
                        </div>
                    @endforeach

                {{-- {{$questions->links()}} --}}
            @else
                <span class="text-info">No PastQuestion on this topic found</span>

            @endif
        </div>

        <div class="col-md-3">
            @include('const.rightbar')
        </div>
    </div>
@endsection
