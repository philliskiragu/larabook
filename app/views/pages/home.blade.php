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

        <p>Do you want to post your first status? Go to your Profile
            </p>
        <p>
            {{ link_to_route('profile_path','Profile', $currentUser->username, ['class' => 'btn btn-lg btn-primary'])}}
        </p>
    </div>


    @stop
