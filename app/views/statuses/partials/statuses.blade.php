@forelse($statuses as $status)
    @include('statuses.partials.status')
@empty
    &nbsp;
    &nbsp;
    <p>This user has not posted anything yet!</p>
@endforelse