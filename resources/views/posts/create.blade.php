<x-app-layout>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-black">
                    <div>
                        <h3 class="pb-6">Create Post</h3>

                        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Post Title -->
                            <div>
                                <x-input-label for="title" :value="__('Title')"/>
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                              :value="old('title')" required
                                              autofocus/>
                                <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                            </div>

                            <!-- Post Excerpt -->
                            <div class="mt-3">
                                <x-input-label for="excerpt" :value="__('Excerpt')"/>
                                <x-text-input id="excerpt" class="block mt-1 w-full" type="text" name="excerpt"
                                              :value="old('excerpt')" required
                                              autofocus/>
                                <x-input-error :messages="$errors->get('excerpt')" class="mt-2"/>
                            </div>

                            <!-- Post Body -->
                            <div class="mt-3">
                                <x-input-label for="body" :value="__('Body')"/>
                                <x-textarea-input id="body" class="block mt-1 w-full" type="text" name="body"
                                                  required
                                                  autofocus>
                                    {{ old('body') }}
                                </x-textarea-input>
                                <x-input-error :messages="$errors->get('body')" class="mt-2"/>
                            </div>

                            <!-- Post Category -->
                            <div class="mt-3">
                                <x-input-label for="category_id" :value="__('Category')"/>
                                <select id="category_id" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>
                            </div>

                            <!-- Post Image -->
                            <div class="mt-3">
                                <x-input-label for="image" :value="__('Image')"/>
                                <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"
                                              :value="old('image')" required
                                              autofocus/>
                                <x-input-error :messages="$errors->get('image')" class="mt-2"/>
                            </div>

                            <div class="flex items-center mt-8">
                                <x-primary-button>
                                    {{ __('Create') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
