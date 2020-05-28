{{--  this is for searching videos   --}}
<div class="panel-group"  style="margin-top:15px;">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <button class="btn btn-info btn-block " style="color:#fff;"data-toggle="collapse" href="#collapse1">
            <span class="glyphicon glyphicon-search"></span> Search Video</button>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse">
      <div class="panel-body">
          <div class="card card-body" style="margin-top:10px;">
                <h3>Search Video</h3>
                {!! Form::open(['action' => 'PostsController@search', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('keyword', 'Search')}}
                        {{Form::text('keyword', '', ['class' => 'form-control', 'placeholder' => 'Search For Video'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('filter', 'Title')}}
                        {!! Form::radio('filter', 'title', '', ['title'=>'click to search videos by title']) !!}
                    </div>
                    <div class="form-group">
                        {{Form::label('filter', 'Author')}}
                        {!! Form::radio('filter', 'author', '', ['title'=>'click to search videos by author']) !!}
                    </div>

                    {{Form::submit('Search', ['class' => 'btn btn-primary btn-block'])}}
                {!! Form::close() !!}

            </div>

      </div>
      {{--  <div class="panel-footer">Panel Footer</div>  --}}
    </div>
  </div>
</div>
{{-- // adverts --}}
@include('const.ui.advert')
{{--  this is for searching past questions  --}}
<div class="panel-group"  style="margin-top:15px;">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <button class="btn btn-info  btn-block " style="color:#fff;"data-toggle="collapse" href="#collapse2">
            <span class="glyphicon glyphicon-search"></span> Search Past Questions</button>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
          <div class="card card-body" style="margin-top:10px;">
                <h3>Search Past Questions</h3>
                {!! Form::open(['action' => 'PastQuestionController@search', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('keyword', 'Search')}}
                        {{Form::text('keyword', '', ['class' => 'form-control', 'placeholder' => 'Search For Past Questions'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('filter', 'Title')}}
                        {!! Form::radio('filter', 'title', '', ['title'=>'click to search past questions by title']) !!}
                    </div>
                    <div class="form-group">
                        {{Form::label('filter', 'Author')}}
                        {!! Form::radio('filter', 'author', '', ['title'=>'click to search past questions by author']) !!}
                    </div>
                    <div class="form-group">
                        {{Form::label('filter', 'Topic')}}
                        {!! Form::radio('filter', 'topic', '', ['title'=>'click to search past questions by topic']) !!}
                    </div>
                    <div class="form-group">
                        {{Form::label('filter', 'Course')}}
                        {!! Form::radio('filter', 'course', '', ['title'=>'click to search past questions by course']) !!}
                    </div>
                    {{Form::submit('Search', ['class' => 'btn btn-primary btn-block'])}}
                {!! Form::close() !!}

            </div>

      </div>
      {{--  <div class="panel-footer">Panel Footer</div>  --}}
    </div>
  </div>
</div>
{{-- //more adverts --}}
@include('const.ui.advert')
