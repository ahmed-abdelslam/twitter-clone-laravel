<ul>
    <li class="mb-4 font-bold text-lg block">
        <a href="/tweets">
            Home
        </a>
    </li>
    <li class="mb-4 font-bold text-lg block">
        <a href="/explore">
            Explore
        </a>
    </li>
    <li class="mb-4 font-bold text-lg block">
        <a href="{{route('profile', auth()->user()->name)}}">
            Profile
        </a>
    </li>
    <li class="mb-4 font-bold text-lg block">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="font-bold text-lg">
                Logout
            </button>
        </form>
    </li>
</ul>

