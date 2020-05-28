@extends('layouts.app')

@section('content')
    <h1>Upload Past Questions</h1>

    <div class="row">
        <div class="row col-md-9">
            <div >
                <form action= '{{ route('create-past-questions') }}' method = 'POST' enctype = multipart/form-data style ='margin:20px;'>
                    @csrf
                    <div class="form-group">
                        <label>Title: </label>
                       <input  type="text" class='form-control' placeholder='Title' name="title"/>
                    </div>
                    {{--  <div class="form-group">
                        {{Form::label('description', 'Description')}}
                        {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Tutorial Description'])}}
                    </div>  --}}

                    <div class="form-group">
                        <label> Select the Topic</label>
                        <select name="topic_id" class="form-control">
                            <option name="topic_id[]" value=""> -- Select a Topic -- </option>
                            @foreach ($topics as $topic)
                                <option name="topic_id[]" value="{{ $topic->id }}"> {{ $topic->title }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Select the Course</label>
                        <select name="course_id" class="form-control">
                            <option name="course_id[]" value=""> -- Select a Course -- </option>
                            @foreach ($courses as $course)
                                <option name="course_id[]" value="{{ $course->id }}"> {{ $course->title }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Select the First Image </label>
                        <input type="file" class="form-control" name="image1">
                        <span style="color:red;">
                            <i>Image is compulsory</i>
                        </span>
                    </div>
                    <div class="form-group">
                        <label> Select the Second Image </label>
                        <input type="file" class="form-control" name="image2">
                    </div>
                    <div class="form-group">
                        <label> Select the Third Image </label>
                        <input type="file" class="form-control" name="image3">
                    </div>
                    <div class="form-group">
                       <label> Select the pdf of the Past Question </label>
                        <input type="file" class="form-control" name="pdf">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload Past Question </button>
                </form>
            </div>
        </div>

        <div class="col-md-3">
            @include('const.rightbar')
        </div>
    </div>
@endsection
