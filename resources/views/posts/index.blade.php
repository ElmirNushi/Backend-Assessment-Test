<x-app-layout>
    <a href="/dashboard">
        <div class="absolute left-80 top-28 mt-2 bg-white p-2 rounded-l hover:text-gray-300 z-0">
            <i class="fa-sharp fa-solid fa-arrow-left fa-xl"></i>
        </div>
    </a>
    <div class="py-12 z-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-black">
                    <div class="flex">
                        <img src="{{ asset('storage/' . $post->image) }}" alt=""
                             class="rounded border-2 border-gray-300 p-2" width="400" height="400">

                        <div class="ml-6 w-full">
                            <a href="/dashboard?category={{ $post->category->name }}">
                                <h4 class="text-s text-gray-500 border-b border-gray-300 hover:text-black">{{ $post->category->name }}</h4>
                            </a>
                            <h1 class="text-3xl text-gray-700 mt-2 mb-2">{{ $post->title }}</h1>
                            <h3 class="text-m text-gray-500 border-b border-gray-300">{{ $post->excerpt }}</h3>
                            <h5 class="text-l text-gray-700 mt-4">{{ $post->body }}</h5>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
