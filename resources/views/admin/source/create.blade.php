@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Add new Feed URL</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route'=>'source.store']) !!}
                <fieldset class="form-group">
                    {!! Form::label('feed_url', 'RSS URL') !!}
                    {!! Form::text('feed_url', null, ['class'=>'form-control', 'placeholder'=>'http://path-to/feed.xml']) !!}
                </fieldset>
                {!! Form::submit('Send', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop