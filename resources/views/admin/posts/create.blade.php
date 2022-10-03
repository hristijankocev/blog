<x-layout>
    <x-setting>
        <x-slot name="heading">Create a post</x-slot>
        <form action="/admin/posts/create" method="POST"
              class="bg-white px-4"
              enctype="multipart/form-data">
            @csrf

            <div class="max-w-4xl mx-auto">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Title
                        <x-asterisk class="text-red-500"/>
                    </label>
                    <input
                        name="title"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="title" type="text" placeholder="Lorem ipsum dolor sit amet"
                        required value="{{ old('title') }}">
                    <x-error for="title" class="pt-2"></x-error>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="excerpt">
                        Excerpt
                        <x-asterisk class="text-red-500"/>
                    </label>
                    <textarea rows="5"
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              maxlength="255" id="body" name="excerpt"
                              placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit..."
                              required>{{ old('excerpt') }}</textarea>
                    <x-error for="excerpt" class="pt-2"></x-error>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                        Body
                        <x-asterisk class="text-red-500"/>
                    </label>
                    <textarea rows="5"
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              maxlength="255" id="body" name="body"
                              placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, rem!"
                              required>{{ old('body') }}</textarea>
                    <x-error for="body" class="pt-2"></x-error>
                </div>

                <div class="mb-6">
                    <label for="category_id"
                           class="block text-gray-700 text-sm font-bold mb-2">Select a category
                        <x-asterisk class="text-red-500"/>
                    </label>
                    <select id="category_id"
                            name="category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                    <x-error for="category_id" class="pt-2"></x-error>
                </div>

                <div class="mb-4 mt-10">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="thumbnail">
                        Upload a thumbnail</label>
                    <input
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="thumbnail"
                        name="thumbnail"
                        type="file"
                        accept="image/*"
                        required/>
                    <x-error for="thumbnail" class="pt-2"></x-error>
                </div>

                <div>
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 mb-2 px-4 rounded focus:outline-none focus:shadow-outline w-full"
                        type="submit">
                        Create
                    </button>
                </div>

            </div>
        </form>
    </x-setting>
</x-layout>
