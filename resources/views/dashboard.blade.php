<x-app-layout>
    <div class="py-12 content-center">
        <div class="grid place-items-center">
            <form method="GET">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                <input type="text" placeholder="Keyword..." name="search" class="rounded-t-xl border-0"
                       value="{{ request('search') }}">
                <button type="submit" style="margin-left: -30px;"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-black dark:text-black">
                    @if ($posts->count())
                        @foreach($posts as $post)
                            <a href="/post/index/{{ $post->title }}">
                                <div class="flex mt-5 border-2 border-gray-300 rounded-xl hover:bg-gray-300">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="rounded-xl"
                                         width="150">

                                    <div class="mt-2">
                                        <span class="text-gray-500 text-sm ml-5">{{ $post->category->name }}</span>
                                        <h2 class="text-gray-700 text-2xl ml-5 mt-1">{{ $post->title }}</h2>
                                        <h4 class="text-gray-700 text-l ml-5">{{ $post->excerpt }}</h4>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <p class="text-center">No posts yet. Please check back later.</p>
                    @endif
                </div>
            </div>
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
