<x-layout>
    <x-slot name="banner">
        <h2>Posts by category "{{$category->name}}"</h2>
    </x-slot>
    <x-slot name="content">
        @foreach($posts as $post)
            <article>
                <a href="/posts/{{$post->id}}">
                    <h1 style="margin-bottom: 0">{{ $post->title }}</h1>
                </a>

                <p>{{ $post->excerpt }}</p>
            </article>
        @endforeach
    </x-slot>
</x-layout>
