@extends('layouts.default')

@section('content')
    <h1>Sign In</h1>

    {{ Form::open(['route' => 'login_path']) }}

    {{--email form input--}}
    <div class="form-group">
        {{ Form::label('email', 'Email:') }}
        {{ Form::email('email', null, ['class' => 'form-control']) }}
    </div>

    {{--password form input--}}
    <div class="form-group">
        {{ Form::label('password', 'Password:') }}
        {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    {{--submit button--}}
    <div class="form-group">
        {{Form::submit('Sign In', ['class'=> 'btn btn-primary' , 'required' => 'required'])}}
    </div>

    {{ Form::close() }}

@stop