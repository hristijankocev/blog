<footer id="newsletter"
        class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
    <img src="{{ asset('storage/site/newsletter.png') }}" alt="mailbox" class="mx-auto mb-6" style="width: 120px;">
    <h5 class="text-3xl">Stay in touch with the latest posts</h5>
    <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

    <div class="mt-10">
        <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
            <form method="POST" action="/newsletter/subscribe" class="lg:flex text-sm">
                @csrf
                <div class="lg:py-3 lg:px-5 flex items-center">
                    <label for="email" class="lg:inline-block">
                        <img src="{{ asset('storage/site/mailbox-icon.svg') }}" alt="mailbox letter">
                    </label>
                    <input id="email" type="text" placeholder="Your email address"
                           class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none"
                           name="email">
                    <x-error for="email"></x-error>
                </div>
                <button type="submit"
                        class="transition-colors duration-300 bg-red-500 hover:bg-red-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                    Subscribe
                </button>
            </form>
        </div>
    </div>
</footer>
