<x-layout>
    <x-slot name="banner">
        <a href="/"><h1 class="text-center">Home</h1></a>
    </x-slot>

    <x-slot name="content">
        <article class="container">
            <h1>{!! $post->title !!}</h1>

            {!! $post->body !!}

            <h4 style="font-weight: normal; margin-top: 0">
                Written by <a href="/posts/author/{{ $post->author->username }}"><strong>{{ $post->author->name }}</strong></a> in
                <a href="/posts/category/{{ $post->category->slug }}"><strong>{{  $post->category->name  }}</strong></a>
            </h4>

            <a href="/">Go Back</a>
        </article>
    </x-slot>
</x-layout>
