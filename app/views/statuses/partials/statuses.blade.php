@if ($statuses->count())
    @foreach($statuses as $status)
        @include('statuses.partials.status')
    @endforeach
@else
    <p>This user has not posted anything yet!</p>
@endif