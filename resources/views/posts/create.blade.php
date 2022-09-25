<x-layout>
    <form action="/admin/posts/create" method="POST" class="mt-20">
        @csrf

        <div class="w-full max-w-lg mx-auto">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h1 class="text-center font-bold">Create a post</h1>
                <div class="mb-4 mt-10">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Title
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
                           class="block text-gray-700 text-sm font-bold mb-2">Select a category</label>
                    <select id="category_id"
                            name="category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}
                                {{ old('category_id') == $category->id ? 'selected' : '' }}">{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                    <x-error for="category_id" class="pt-2"></x-error>
                </div>

                <div>
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full"
                        type="submit">
                        Create
                    </button>
                </div>
            </form>

        </div>
    </form>
</x-layout>
