<!DOCTYPE html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8" x-data>
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/logo.png" alt="Lorem Ipsum" width="190" height="auto">
            </a>
        </div>

        <div class="mt-8 md:mt-0">
            <a href="/" class="text-xs font-bold uppercase">Home Page</a>

            <a href="#" class="bg-red-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5"
               @click="alert('Not yet..');">
                Subscribe for Updates
            </a>
        </div>
    </nav>
    <h1 class="text-center" x-data="{ message: 'I ❤️ Alpine' }" x-text="message"></h1>

    {{  $slot  }}

</section>
</body>

