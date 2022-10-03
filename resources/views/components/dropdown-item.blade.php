@props(['active' => false])
@php
    $classes = 'block py-1 hover:bg-blue-500 hover:text-white ';
    if($active)
        $classes .= ' bg-blue-500 text-white';
    else
        $classes .= ' text-gray-800';
@endphp

<a {{ $attributes }}
    {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</a>
