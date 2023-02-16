<x-app-layout>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-black">
                    <div>
                        <h3 class="pb-6">Update Post</h3>

                        <form method="POST" action="/post/edit/{{ $post->title }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Post Title -->
                            <div>
                                <x-input-label for="title" :value="__('Title')"/>
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                              value="{{ old('title', $post->title) }}" required
                                              autofocus/>
                                <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                            </div>

                            <!-- Post Excerpt -->
                            <div class="mt-3">
                                <x-input-label for="excerpt" :value="__('Excerpt')"/>
                                <x-text-input id="excerpt" class="block mt-1 w-full" type="text" name="excerpt"
                                              value="{{ old('excerpt', $post->excerpt) }}" required
                                              autofocus/>
                                <x-input-error :messages="$errors->get('excerpt')" class="mt-2"/>
                            </div>

                            <!-- Post Body -->
                            <div class="mt-3">
                                <x-input-label for="body" :value="__('Body')"/>
                                <x-textarea-input id="body" class="block mt-1 w-full" type="text" name="body"
                                                  required
                                                  autofocus>
                                    {{ old('body', $post->body) }}
                                </x-textarea-input>
                                <x-input-error :messages="$errors->get('body')" class="mt-2"/>
                            </div>

                            <!-- Post Category -->
                            <div class="mt-3">
                                <x-input-label for="category_id" :value="__('Category')"/>
                                <select id="category_id" name="category_id">
                                    @foreach($categories as $category)
                                        <option @selected($category->id == $post->category_id) value="{{ old('category_id', $category->id) }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>
                            </div>

                            <!-- Post Image -->
                            <div class="flex justify-between">
                                <div class="mt-3">
                                    <x-input-label for="image" :value="__('Image')"/>
                                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"
                                                  :value="old('image')"
                                                  autofocus/>
                                    <x-input-error :messages="$errors->get('image')" class="mt-2"/>
                                </div>
                                <div>
                                    <img src="{{ asset('storage/' . $post->image) }}" alt=""
                                         width="70">
                                </div>
                            </div>

                            <div class="flex items-center mt-8">
                                <x-primary-button>
                                    {{ __('Edit') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
