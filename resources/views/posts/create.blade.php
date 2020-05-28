@extends('layouts.app')

@section('content')
    <h1>Upload Video</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Tutorial Description'])}}
        </div>
        <div class="form-group">
            {{Form::file('video')}}
        </div>
        {{Form::submit('Upload', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
