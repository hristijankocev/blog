<x-layout>
    <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10 mt-20">
        <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
            <img
                src="{{ $post->thumbnail != null ? asset('/storage/' . $post->thumbnail) : '/storage/site/illustration-2.jpg' }}"
                alt="thumbnail" class="rounded-xl">

            <p class="mt-4 block text-gray-400 text-xs">
                Published
                <time>{{ $post->created_at->diffForHumans() }}</time>
            </p>

            <div class="flex items-center lg:justify-center text-sm mt-4">
                <img src="{{ asset('storage/site/robot.png') }}" alt="Robot" style="max-height: 64px">
                <div class="ml-3 text-left">
                    <a href="/?author={{ $post->author->username }}">
                        <h5 class="font-bold">{{  $post->author->name  }}</h5>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-span-8 lg:pt-5">
            <div class="hidden lg:flex justify-between mb-6">
                <a href="/"
                   class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                    <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                            </path>
                            <path class="fill-current"
                                  d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                            </path>
                        </g>
                    </svg>
                    Back to Posts
                </a>

                <div class="space-x-2">
                    <a href="/?category={{ $post->category->slug }}"
                       class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                       style="font-size: 10px">{{ $post->category->name }}</a>
                </div>
            </div>

            <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                {{ $post->title }}
            </h1>

            <div class="space-y-4 lg:text-lg leading-loose">
                {!! $post->body !!}
            </div>
        </div>

        <section class="col-span-8 col-start-5 mt-10 space-y-2">
            <hr>
            <div class="bg-gray-100 border border-gray-300 rounded-xl p-5 lg:grid lg:grid-cols-12">
                @auth
                    <div class="flex-shrink-0 pb-2 col-span-12">
                        <x-error for="comment"></x-error>
                    </div>
                    <div class="col-span-2">
                        <img src="{{ asset('storage/site/robot.png') }}" alt="avatar-placeholder" width="70" height="70"
                             class="rounded-xl">
                    </div>
                    <div class="col-span-10">
                        <form method="POST" action="/comments" class="h-full">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <textarea
                                rows="5"
                                class="w-full h-100 bg-gray-100 border border-gray-200 focus:bg-white focus:border-gray-500 focus:outline-none py-2 px-2 rounded text-gray-700"
                                maxlength="255" id="comment-body" name="comment"
                                placeholder="Write a comment..."
                                required></textarea>
                            <button
                                class="bg-blue-600 hover:bg-blue-800 text-white font-bold px-4 py-2 mt-3 rounded focus:outline-none focus:shadow-outline text-sm w-full"
                                type="submit">
                                Post comment
                            </button>
                        </form>
                    </div>
                @else
                    <p class="col-span-12 text-sm"><i><a href="/login" class="font-semibold">Login</a> to post a
                            comment.</i>
                    </p>
                @endauth
            </div>
            @if($post->comments()->count())
                @foreach($post->comments as $comment)
                    <x-post-comment :comment="$comment"></x-post-comment>
                @endforeach
            @else
                <p class="text-sm">No comments on this post yet :(</p>
            @endif
        </section>
    </article>

</x-layout>
