@props(['for'])

@php
    $defaults = [
        'for' => $for,
        'class' => 'block mb-3 text-sm font-medium text-black',
    ];
@endphp
<label {{ $attributes($defaults) }}>
    {{ $slot }}
</label>
