<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-black">
                    <div>
                        <div class="flex justify-between">
                            <h3 class="pb-6">All posts by user: <span class="font-bold">{{ auth()->user()->name }}</span>
                            </h3>

                            <h3><a href="{{ route('post.create') }}"><i class="fa-solid fa-plus"></i> Create new post</a>
                            </h3>
                        </div>

                        @if ($user->posts->count())
                            @foreach($user->posts as $post)
                                <a href="/post/index/{{ $post->title }}">
                                    <div class="p-4 mb-5 border-2 border-gray-500 rounded-full flex justify-between">
                                        <h2>{{ $post->title }}</h2>

                                        <div class="flex">
                                            <a href="/post/edit/{{ $post->title }}" class="text-blue-700">Edit</a>
                                            <form action="/post/delete/{{ $post->title }}" method="POST" class="ml-3 "
                                                  onsubmit="return confirm('Are you sure?');">
                                                @csrf

                                                @method('DELETE')

                                                <input type="submit" class="text-red-700 cursor-pointer" value="Delete">
                                            </form>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <p class="text-center">You have 0 posts created, create a post to view it.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
