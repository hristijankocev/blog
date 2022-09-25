@props(['categories', 'currentCategory'])
<label>
    <select x-data
            class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold"
            style=""
            @change="window.location = $el.value">
        <option selected disabled>Category</option>
        <option value="/?{{ http_build_query(request()->except('category')) }}"
                class="{{ isset($currentCategory) ? '' : ' text-white bg-blue-500'}}"
            {{ isset($currentCategory) ? '' : 'selected' }}> All
        </option>
        @foreach($categories as $category)
            @isset($currentCategory)
                <option
                    {{ $currentCategory->is($category) ? 'selected' : '' }}
                    value="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}"
                    class="{{ $currentCategory->is($category) ? 'text-white bg-blue-500' : '' }}">
                    {{ ucfirst($category->name) }}
                </option>
            @else
                <option
                    value="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}">
                    {{ ucfirst($category->name) }}
                </option>
            @endif

        @endforeach
    </select>

</label>
