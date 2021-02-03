<div class="border border-grey-300 rounded-lg">
    @forelse($tweets as $tweet)
        @include('timeline._tweet')
    @empty
        <p class="p-4">No tweets yet.</p>
    @endforelse
</div>
<div class="mt-3">
    {{$tweets->links()}}
</div>

