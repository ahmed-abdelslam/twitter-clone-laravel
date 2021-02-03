<div class="flex p-4 border-b border-b-grey-400">
    <div class="mr-2 flex-shrink-0">
        <a href="{{route('profile', $tweet->user->name)}}">
            <img
                class="flex-initial mr-2 rounded-full w-10 h-10"
                src="{{$tweet->user->getProfilePhotoUrlAttribute()}}"
                alt=""
            >
        </a>
    </div>
    <div>
        <h5 class="font-bold mb-4">
            <a href="{{route('profile', $tweet->user->name)}}">
                {{$tweet->user->name}}
            </a>
        </h5>
        <p class="text-sm mb-3">
            {{$tweet->body}}
        </p>
        <div class="flex">
            <form action="/tweets/{{$tweet->id}}/like" method="post">
            @csrf
                <div class="flex items-center mr-4">
                    <button type="submit">
                        <i class="fa fa-thumbs-up
                            {{$tweet->isLikedBy(auth()->user()) ? 'text-blue-500' : 'text-gray-400'}} mr-1 w-3 text-sm"
                            aria-hidden="true"></i>
                    </button>
                    <span class="text-xs text-gray-500">{{$tweet->likes ?: 0}}</span>
                </div>
            </form>
            <form action="/tweets/{{$tweet->id}}/like" method="post">
                @csrf
                @method('DELETE')
                <div class="flex items-center">
                    <button type="submit">
                        <i class="fa fa-thumbs-down
                        {{$tweet->isDisLikedBy(auth()->user()) ? 'text-blue-500' : 'text-gray-400'}} mr-1 w-3 text-sm"
                        aria-hidden="true"></i>
                    </button>
                    <span class="text-xs text-gray-500">{{$tweet->dislikes ?: 0}}</span>
                </div>
            </form>
        </div>
    </div>
</div>
