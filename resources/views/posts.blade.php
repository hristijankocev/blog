<x-layout>
    <x-header :categories="$categories" :currentCategory="$currentCategory"></x-header>

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if($posts->count())
            <x-posts-grid :posts="$posts"></x-posts-grid>
        @else
            <p class="text-center">No posts yet :(</p>
        @endif

    </main>

    <x-footer></x-footer>
</x-layout>
