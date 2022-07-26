<x-layout>
    <x-slot name="banner">
        <h1 class="text-center">My blog</h1>
    </x-slot>

    <x-slot name="content">
        @foreach($posts as $post)
            <article>
                <a href="/posts/{{$post->getId()}}">
                    <h1>{{ $post->title }}</h1>
                </a>
                <p>{{ $post->excerpt }}</p>
            </article>
        @endforeach
    </x-slot>
</x-layout>
