@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Add new Feed URL</h2>
        </div>
    </div>
    <div class="row">
        {!! Form::model($source, ['route'=>['source.update', $source->id], 'method'=>'put']) !!}
            <div class="col-md-9">
                <fieldset class="form-group">
                    {!! Form::label('feed_url', 'RSS URL') !!}
                    {!! Form::text('feed_url', null, ['class'=>'form-control', 'placeholder'=>'http://path-to/feed.xml']) !!}
                </fieldset>
                {!! Form::submit('Send', ['class'=>'btn btn-primary']) !!}
            </div>
            <div class="col-md-3">
                Categories
                @foreach ($categories as $category)
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('category_id[]', $category->id, $source->categories->contains($category->id)) !!} {{ $category->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        {!! Form::close() !!}
    </div>
@stop