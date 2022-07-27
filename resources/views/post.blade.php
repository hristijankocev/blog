<x-layout>
    <x-slot name="banner">
        <h1 class="text-center">My blog</h1>
    </x-slot>

    <x-slot name="content">
        <article class="container">
            <h1>{!! $post->title !!}</h1>

            {!! $post->body !!}

            <a href="#" class="float-right">{{  $post->category->name  }}</a>

            <a href="/">Go Back</a>
        </article>
    </x-slot>
</x-layout>
