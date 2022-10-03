@props(['trigger', 'trigger_id', 'dropdown_id', 'options'])
<button id="{{ $trigger_id }}" data-dropdown-toggle="{{ $dropdown_id }}"
        class="text-center inline-flex items-center bg-white ml-3 rounded-full text-xs font-semibold
        text-dark uppercase py-3 px-5 hover:text-gray-800"
        type="button">
    {{ $trigger }}
    <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
    </svg>
</button>

<!-- Dropdown menu -->
<div id="{{ $dropdown_id }}"
     class="hidden z-10 w-44 bg-gray-100 rounded-xl divide-y divide-gray-200 shadow  dark:divide-gray-600 overflow-hidden"
     style="position: absolute; inset: 0 auto auto 0; margin: 0; transform: translate3d(0px, 510.4px, 0px);"
     data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
    <ul class="text-sm bg-gray-100 " aria-labelledby="{{ $trigger_id }}">
        {{ $options }}
    </ul>
</div>



