@extends('layouts.app')

@section('content')
     <h1>Search Results</h1>

    <div class="row">
        <div class="row col-md-9">
            @if(count($authors) > 0)

                    @foreach($authors as $author)

                        <div class="col-md-4 col-xs-12 card  bg-light" style="margin:10px;margin-right:40px; height:300px;padding:10px;">

                                <div id="myCarousel{{$author->id}}" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel{{$author->id}}" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel{{$author->id}}" data-slide-to="1"></li>
                                        <li data-target="#myCarousel{{$author->id}}" data-slide-to="2"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active">
                                        <img src="/storage/past_questions_images/{{$author->image1}}" alt="Past Question Image 1" style="height:auto;">
                                        </div>

                                        <div class="item">
                                        <img src="/storage/past_questions_images/{{$author->image2}}" alt="Past Question Image 2">
                                        </div>

                                        <div class="item">
                                        <img src="/storage/past_questions_images/{{$author->image3}}" alt="Past Question Image 3">
                                        </div>
                                    </div>

                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel{{$author->id}}" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel{{$author->id}}" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    </div>

                            <h3><a href="/past-questions/{{$author->id}}">{{$author->title}}</a></h3>
                            <a href="/storage/past_questions/{{$author->pdf}}" download>Free pdf Download here</a>
                            <small>Written on {{$author->created_at}} by {{$author->user->name}} </small>
                        </div>
                    @endforeach

                {{-- {{$questions->links()}} --}}
            @else
                <span class="text-info">No Author found</span>

            @endif
        </div>

        <div class="col-md-3">
            @include('const.rightbar')
        </div>
    </div>
@endsection
