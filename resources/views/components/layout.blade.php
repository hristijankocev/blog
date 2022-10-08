<!DOCTYPE html>

<title>Laravel From Scratch Blog</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div class="flex justify-center">
            <a href="/">
                <img src="{{ asset('storage/site/logo.png') }}" alt="Lorem Ipsum" width="190" height="auto">
            </a>
        </div>

        <div class="mt-8 md:mt-0 text-center">

            @auth
                <x-dropdown trigger_id="test" dropdown_id="asd">
                    <x-slot name="trigger">
                        Welcome back, {{ auth()->user()->name }}!
                    </x-slot>
                    <x-slot name="options">
                        <div class="divide-y w-44 divide-gray-300 dark:bg-gray-700 dark:divide-gray-600">
                            @admin
                            <div>
                                <x-dropdown-item href="/admin/posts"
                                                 active="{{ request()->is('admin/posts') }}">
                                    Dashboard
                                </x-dropdown-item>
                                <x-dropdown-item href="/admin/posts/create"
                                                 active="{{ Illuminate\Support\Facades\Route::is('post.create') }}">
                                    New post
                                </x-dropdown-item>
                            </div>
                            @endadmin
                            <x-dropdown-item href="/logout" x-data="{}"
                                             @click.prevent="document.querySelector('#logout-form').submit()">
                                Logout
                                <form id="logout-form" action="/logout" class="hidden" method="POST">
                                    @csrf
                                </form>
                            </x-dropdown-item>
                        </div>
                    </x-slot>
                </x-dropdown>

            @else
                <a href="/login" class="text-xs font-bold uppercase px-5 hover:text-gray-800">Login</a>
                <a href="/register" class="text-xs font-bold uppercase px-5 hover:text-gray-800">Register</a>
            @endauth

            <a href="#newsletter"
               class="text-center inline-flex items-center bg-red-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 hover:text-gray-800">
                Subscribe for Updates
            </a>
        </div>
    </nav>

    <h1 x-data="{ message: 'I ❤️ Alpine' }" x-text="message" class="text-center"></h1>


    {{  $slot  }}

    <x-flash></x-flash>

    <x-footer></x-footer>
</section>

<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

</body>

