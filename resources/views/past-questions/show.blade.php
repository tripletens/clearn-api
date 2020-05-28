@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-md-9">
        <a href="/past-questions" class="btn btn-secondary btn-lg btn-primary">Go Back to Past Questions </a>
        <div class="col-md-8 col-xs-12 card  bg-light" style="margin:10px;margin-right:40px; height:auto;padding:10px;">

                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active">
                                        <img src="/storage/past_questions_images/{{$question->image1}}" alt="Past Question Image 1" style="height:auto;">
                                        </div>

                                        <div class="item">
                                        <img src="/storage/past_questions_images/{{$question->image2}}" alt="Past Question Image 2">
                                        </div>

                                        <div class="item">
                                        <img src="/storage/past_questions_images/{{$question->image3}}" alt="Past Question Image 3">
                                        </div>
                                    </div>

                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    </div>

                            <h3><a href="/past-questions/{{$question->id}}">{{$question->title}}</a></h3>
                            <a href="/storage/past_questions/{{$question->pdf}}" download>Free pdf Download here</a>
                            <small>Written on {{$question->created_at}} by {{$question->user->name}} </small>
                        </div>
    </div>
     <div class="col-md-3">
        @include('const.rightbar')
    </div>
</div>
@endsection
