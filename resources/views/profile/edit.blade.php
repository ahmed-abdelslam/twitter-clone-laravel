<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tweety
        </h2>
    </x-slot>

    <form action="/{{$user->name}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="mb-6">
        <label for="name" class="block mb-2 uppercase font-bold text-sm text-gray-700">Name</label>
        <input type="text" class="border border-gray-400 p-2 w-full" id="name" name="name" required value="{{$user->name}}">
        @error('name')
        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="email" class="block mb-2 uppercase font-bold text-sm text-gray-700">Email</label>
        <input type="email" class="border border-gray-400 p-2 w-full" id="email" name="email" required value="{{$user->email}}">
        @error('email')
        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="avatar" class="block mb-2 uppercase font-bold text-sm text-gray-700">Avatar</label>
        <div class="flex">
            <input type="file" class="border border-gray-400 p-2 w-full" id="avatar" name="profile_photo_path" value="{{$user->name}}">
            <img src="/{{$user->profile_photo_path}}" alt="" width="40">
        </div>
        @error('profile_photo_path')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
    </div>
    <div class="mb-6">
        <label for="password" class="block mb-2 uppercase font-bold text-sm text-gray-700">Password</label>
        <input type="password" class="border border-gray-400 p-2 w-full" id="password" name="password">
        @error('password')
        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="password_confirmation" class="block mb-2 uppercase font-bold text-sm text-gray-700">Password Confirmation</label>
        <input type="password" class="border border-gray-400 p-2 w-full" id="password_confirmation" name="password_confirmation">
        @error('password_confirmation')
        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6">
        <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
            Submit
        </button>
    </div>
    </form>
</x-app-layout>

