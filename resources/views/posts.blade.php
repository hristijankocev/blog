<x-layout>
    <x-slot name="banner">
        <h1 class="text-center">My blog</h1>
    </x-slot>

    <x-slot name="content">
        @foreach($posts as $post)
            <article>
                <a href="/posts/{{$post->id}}">
                    <h1 style="margin-bottom: 0">{{ $post->title }}</h1>
                </a>
                <a href="#"><i>{{  $post->category->name  }}</i></a>

                <p>{{ $post->excerpt }}</p>
            </article>
        @endforeach
    </x-slot>
</x-layout>
