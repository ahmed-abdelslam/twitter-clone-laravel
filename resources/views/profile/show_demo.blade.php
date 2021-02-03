<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Profile
        </h2>
    </x-slot>

    <header class="relative mb-5">
        <img
            class="rounded-lg mb-3"
            style="height: 204px;width: 100%;"
            src="/images/default-image-banner.png"
            alt=""
        >
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-bold text-2xl">{{$user->name}}</h2>
                <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
            </div>
            <div class="flex">
                @can('edit', $user)
                <a href="/user/profile" class="rounded-full font-bold border border-gray-300 py-2 px-3 text-sm">Edit Profile</a>
                @endcan
                @if(auth()->user()->isNot($user))
                <form action="/{{$user->name}}/follow" method="post">
                @csrf
                    <button href="" type="submit"
                            class="bg-blue-500 font-bold rounded-full shadow py-2 px-3 text-white text-sm ml-2">
                            {{auth()->user()->isFollowing($user) ? 'Unfollow Me' : 'Follow Me'}}
                    </button>
                </form>
                @endif
            </div>
        </div>

        <p class="text-sm mt-6">
            Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
            Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
        </p>

        <img
                class="flex-initial mr-2 rounded-full absolute"
                style="left: calc(50% - 70px); top: 36%; width: 130px; height: 130px;"
                src="{{$user->getProfilePhotoUrlAttribute()}}"
                alt=""
            >

    </header>

    @include('timeline._timeline', ['tweets' => $tweets])
</x-app-layout>

