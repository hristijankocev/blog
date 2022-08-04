@props(['categories', 'currentCategory'])

<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-red-500">Lorem Ipsum</span> News
    </h1>

    <h2 class="inline-flex mt-2">By Hristijan Kocev <img src="/images/robot.png" alt="Robot" style="max-height: 24px"></h2>

    <p class="text-sm mt-14">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam iste maiores reprehenderit! Amet dignissimos
        dolores id rem repellendus tempore totam.
    </p>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!--  Category -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
            <label>
                <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold"
                        style=""
                        @change="window.location = $el.value">
                    <option selected disabled>Category</option>
                    <option value="/">All</option>
                    @foreach($categories as $category)
                        @isset($currentCategory)
                            <option
                                {{ $currentCategory->is($category) ? 'selected' : '' }}
                                value="/posts/category/{{ $category->slug }}"
                                class="{{ $currentCategory->is($category) ? 'text-white bg-blue-500' : '' }}">
                                {{ ucfirst($category->name) }}
                            </option>
                        @else
                            <option
                                value="/posts/category/{{ $category->slug }}">{{ ucfirst($category->name) }}
                            </option>
                        @endif

                    @endforeach
                </select>
            </label>

            <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                 height="22" viewBox="0 0 22 22">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                    </path>
                    <path fill="#222"
                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                </g>
            </svg>
        </div>

        <!-- Other Filters -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
            <label>
                <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold"
                        @change="alert($el.value + '!')">
                    <option value="category" disabled selected>Other Filters</option>
                    <option value="foo">Foo</option>
                    <option value="bar">Bar</option>
                </select>
            </label>

            <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                 height="22" viewBox="0 0 22 22">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                    </path>
                    <path fill="#222"
                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                </g>
            </svg>
        </div>

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="#">
                <input type="text" name="search" placeholder="Find something"
                       class="bg-transparent placeholder-black font-semibold text-sm">
            </form>
        </div>
    </div>
</header>
