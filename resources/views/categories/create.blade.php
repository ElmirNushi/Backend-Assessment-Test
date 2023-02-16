<x-app-layout>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-black">
                    <div>
                        <h3 class="pb-6">Create Category</h3>

                        <form method="POST" action="{{ route('category.store') }}">
                            @csrf

                            <!-- Category Name -->
                            <div>
                                <x-input-label for="name" :value="__('Name')"/>
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                              :value="old('name')" required
                                              autofocus />
                                <span class="text-xs text-gray-400">*Categories can be a max of 12 letters.</span>
                                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                            </div>

                            <div class="flex items-center mt-5">
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
