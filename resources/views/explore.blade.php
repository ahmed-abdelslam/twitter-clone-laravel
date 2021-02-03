<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Explore
        </h2>
    </x-slot>

    <div>
        @foreach($users as $user)
        <a href="{{route('profile', $user->name)}}" class="flex items-center mb-5">
            <img src="{{$user->getProfilePhotoUrlAttribute()}}" alt="" class="mr-4 rounded-full w-12 h-12">
            <div>
                <h4 class="font-bold">{{'@'.$user->name}}</h4>
            </div>
        </a>
        @endforeach
        {{$users->links()}}
    </div>
</x-app-layout>
