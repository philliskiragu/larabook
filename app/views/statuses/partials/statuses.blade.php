@forelse($statuses as $status)
    @include('statuses.partials.status')
@empty
    <p>This user has not posted anything yet!</p>
@endforelse