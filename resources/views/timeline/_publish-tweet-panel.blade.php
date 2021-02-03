<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form action="/tweets" method="post">
    @csrf
        <textarea
            name="body"
            id=""
            class="w-full border-0	"
            placeholder="What's up doc?"
            required
        ></textarea>
        <hr class="my-4">
        <footer class="flex justify-between">
            <img
                class="flex-initial mr-2 rounded-full w-10 h-10"
                src="{{auth()->user()->getProfilePhotoUrlAttribute()}}"
                alt=""
            >
            <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">Tweet-a-roo!</button>
        </footer>
    </form>
    @error('body')
    <p class="text-red-500 text-sm mt-2">{{$message}}</p>
    @enderror
</div>
