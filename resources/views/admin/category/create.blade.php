@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Add new Category</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route'=>'admin.category.store']) !!}
                <fieldset class="form-group">
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Category Name']) !!}
                </fieldset>
                <fieldset class="form-group">
                    {!! Form::text('image_url', null, ['class'=>'form-control', 'placeholder'=>'Background Image']) !!}
                </fieldset>
                {!! Form::submit('Send', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop