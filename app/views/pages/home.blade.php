@extends('layouts.default')

@section('content')

    <div class="jumbotron">
        <h1>Welcome to Larabook</h1>
        <p>Welcome to the premier place to talk about Laravel with others.</p>

        @if (! $currentUser)
            <p>Sign up to see what its all about!</p>
        <p>
            {{ link_to_route('register_path','Sign Up!', null, ['class' => 'btn btn-lg btn-primary'])}}
        </p>
            @endif

    </div>


    @stop
