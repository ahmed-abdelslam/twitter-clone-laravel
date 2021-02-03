<h3 class="font-bold text-xl mb-4">Following</h3>
<ul>
@forelse(auth()->user()->follows as $user)
  <li class="mb-4">
    <div>
        <a href="{{route('profile', $user->name)}}" class="flex items-center">
            <img
                class="flex-initial mr-2 rounded-full"
                src="{{$user->getProfilePhotoUrlAttribute()}}"
                alt=""
                width="40"
                height="40"
            >
            <span class="flex-initial text-sm">{{$user->name}}</span>
        </a>
    </div>
  </li>
@empty
    <li class="mb-4">No friends yet.</li>
@endforelse
</ul>
