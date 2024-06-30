@props(['href'])
@php
    $defaults = [
        'href' => $href,
        'class' => 'text-blue-500 hover:text-black',
    ];
@endphp

<a {{ $attributes($defaults) }}>
    {{ $slot }}
</a>
