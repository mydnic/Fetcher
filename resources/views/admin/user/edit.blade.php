@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Change your account settings</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::model(Auth::user(), ['route'=>'settings.update', 'method'=>'put']) !!}
                <fieldset class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'admin@email.com']) !!}
                </fieldset>
                <fieldset class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                </fieldset>
                <fieldset class="form-group">
                    {!! Form::label('password_confirmation', 'Password Confirmation') !!}
                    {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                </fieldset>
                {!! Form::submit('Send', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop