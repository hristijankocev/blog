<x-layout>
    <x-slot name="banner">
        <a href="/"><h1 class="text-center">Home</h1></a>
    </x-slot>

    <x-slot name="content">
        @foreach($posts as $post)
            <article>
                <a href="/posts/{{$post->id}}">
                    <h1 style="margin-bottom: 0">{{ $post->title }}</h1>
                </a>
                <h4 style="font-weight: normal; margin-top: 0">
                    Written by <a
                        href="/posts/author/{{ $post->author->username }}"><strong>{{ $post->author->name }}</strong></a> in
                    <a href="/posts/category/{{ $post->category->slug }}"><strong>{{  $post->category->name  }}</strong></a>
                </h4>

                <p>{{ $post->excerpt }}</p>
            </article>
        @endforeach
    </x-slot>
</x-layout>
