<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Timeline
        </h2>
    </x-slot>

    @include('timeline._publish-tweet-panel')

    @include('timeline._timeline')
</x-app-layout>

