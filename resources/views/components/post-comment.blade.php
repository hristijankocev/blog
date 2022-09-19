@props(['comment'])
<article class="flex bg-gray-100 border border-gray-300 rounded-xl p-5 space-x-5">
    <div class="flex-shrink-0">
        <img src="{{ asset('images/avatar.jpg') }}" alt="avatar-placeholder" width="70" height="70"
             class="rounded-xl">
    </div>
    <div>
        <header class="mb-5">
            <h3 class="font-bold">{{ $comment->author->name }}</h3>
            <p class="text-sm">Posted
                <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time>
            </p>
        </header>
        <p>{{ $comment->body }}</p>
    </div>
</article>
