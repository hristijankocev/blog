<x-layout>

    <main class="mt-20">
        <h1 class="text-center font-bold text-gray-800">Login</h1>

        <form class="w-full max-w-lg mx-auto mt-16" method="POST" action="/login">
            @csrf

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="username">
                        Username
                    </label>
                    <input
                        class="@error('username') border-red-500 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="username" type="text" placeholder="jane.doe" name="username"
                        value="{{ old('username') }}" autocomplete="username">
                    <x-error for="username"></x-error>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6 hidden">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="email">
                        Email
                    </label>
                    <input
                        class="@error('email') border-red-500 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="email" type="email" placeholder="jane.doe@example.com" name="email"
                        value="{{ old('email') }}" autocomplete="current-password">
                    <x-error for="email"></x-error>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="password">
                        Password
                    </label>
                    <input
                        class="@error('password') border-red-500 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="password" type="password" placeholder="******************" name="password">
                    <x-error for="password"></x-error>
                </div>
            </div>
            <div class="flex flex-wrap">
                <button
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Login
                </button>
            </div>
        </form>
    </main>
</x-layout>
