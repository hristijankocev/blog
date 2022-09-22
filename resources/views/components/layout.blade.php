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
                <img src="/images/logo.png" alt="Lorem Ipsum" width="190" height="auto">
            </a>
        </div>

        <div class="mt-8 md:mt-0 text-center">

            @auth
                <span
                    class="text-xs font-bold uppercase px-5 text-gray-800 ml-3 rounded-full py-3">
                    Welcome back, {{ auth()->user()->name }}!
                </span>
                <form action="/logout" class="inline" method="POST">
                    @csrf
                    <button type="submit"
                            class="text-xs font-bold uppercase px-5 text-white hover:text-gray-800 bg-red-500 ml-3 rounded-full py-3">
                        Logout
                    </button>
                </form>
            @else
                <a href="/login" class="text-xs font-bold uppercase px-5 hover:text-gray-800">Login</a>
                <a href="/register" class="text-xs font-bold uppercase px-5 hover:text-gray-800">Register</a>
            @endauth

            <a href="#newsletter"
               class="bg-red-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 hover:text-gray-800">
                Subscribe for Updates
            </a>
        </div>
    </nav>

    <h1 x-data="{ message: 'I ❤️ Alpine' }" x-text="message" class="text-center"></h1>


    {{  $slot  }}

    <x-flash></x-flash>

</section>
</body>

