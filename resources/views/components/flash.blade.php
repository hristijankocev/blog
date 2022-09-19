@if (session()->has('success'))
    <div x-data="{show: true}"
         x-init="setTimeout(() => show = false, 3000)"
         x-show="show"
         x-transition
         x-transition:enter.duration.500ms
         x-transition:leave.duration.400ms
         class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3"
    >
        <p>{{ session('success') }}</p>
    </div>
@endif
