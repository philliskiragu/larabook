@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="media">
                <div class="pull-left">
                    @include ('users.partials.avatar',['size' =>50])
                </div>

                <div class="media-body">
                    <h1 class="media-heading">{{ $user->username }}</h1>

                    <ul class="list-inline text-muted">
                        <li>{{$user->present()->statusCount()}}</li>
                        <li>{{$user->present()->followerCount()}}</li>
                        <li>{{$user->present()->followedCount()}}</li>
                    </ul>


                    @foreach($user->followers as $follower)
                        <ul class="list-inline text-muted">
                            <li>@include ('users.partials.avatar',['size' =>25, 'user'=>$follower])</li>
                            <li>{{$follower->username}}</li>
                            <li></li>
                        </ul>
                    @endforeach
                </div>
            </div>

        </div>
        <div class="col-md-6">
            @unless($user->is($currentUser))
                @include('users.partials.follow-form')
            @endunless

            @if ($user->is($currentUser))
                @include('statuses.partials.publish-status-form')
            @endif

            @if(! $currentUser)
                <p>Register or Log In to follow this person</p>
            @endif

            @include('statuses.partials.statuses', ['statuses'=>$user->statuses])
        </div>
    </div>
@stop