<x-layout>
    <x-setting>
        <x-slot name="heading">Manage Posts</x-slot>

        <div class="container mx-auto px-4 sm:px-8 max-w-8xl">
            <div class="py-8">
                <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                    <h2 class="text-2xl leading-tight">
                        All Posts
                    </h2>
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                            <tr>
                                <th scope="col"
                                    class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    Title
                                </th>
                                <th scope="col"
                                    class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    By
                                </th>
                                <th scope="col"
                                    class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    Created at
                                </th>
                                <th scope="col"
                                    class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    status
                                </th>
                                <th scope="col"
                                    class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <a href="/posts/{{ $post->id }}"
                                           class="text-blue-600 hover:text-blue-900 whitespace-no-wrap">
                                            {{ $post->title }}
                                        </a>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $post->author->name }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            <time>{{ $post->created_at->format('F j, Y, g:i a') }}</time>
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <span
                                        title="Change published status"
                                        class="relative inline-block px-2 py-1 font-semibold leading-tight
                                        {{ $post->published_at === null ? 'text-red-900' : 'text-green-900' }}">
                                        <span aria-hidden="true"
                                              class="absolute inset-0 opacity-50 rounded-full
                                              {{ $post->published_at === null ? 'bg-red-200' : 'bg-green-200' }}">
                                        </span>
                                        <span class="relative">
                                            <a x-data="{}"
                                               @click.prevent="document.querySelector('#change-status-post-{{ $post->id }}').submit()"
                                               href="/admin/posts/{{ $post->id }}/status">
                                            {{ $post->published_at === null ? 'drafted' : 'published' }}
                                            </a>
                                            <form action="/admin/posts/{{ $post->id }}/status" method="POST"
                                                  id="change-status-post-{{ $post->id }}">
                                                @method('PATCH')
                                                @csrf
                                            </form>
                                        </span>
                                    </span>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <a href="/admin/posts/{{ $post->id }}/edit"
                                           class="text-blue-600 hover:text-blue-900">
                                            Edit
                                        </a>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <a href="/admin/posts/{{ $post->id }}/delete"
                                           class="hidden"
                                           x-data="{}"
                                           @click.prevent="document.querySelector('#delete-post-{{ $post->id }}').submit()">
                                            Delete
                                        </a>
                                        <input class="text-blue-600 bg-transparent hover:text-blue-900 cursor-pointer"
                                               type="submit"
                                               value="Delete"
                                               form="delete-post-{{ $post->id }}">
                                        <form action="/admin/posts/{{ $post->id }}" method="POST"
                                              id="delete-post-{{ $post->id }}"
                                              class="hidden"
                                              title="Delete post"
                                              onsubmit="return confirm('Do you really want to delete the post?');">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>

    </x-setting>
</x-layout>
