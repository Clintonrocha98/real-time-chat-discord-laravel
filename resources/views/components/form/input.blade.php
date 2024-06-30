@props(['name', 'type', 'value'])

@php
    $defaults = [
        'type' => $type ?? 'text',
        'id' => $name,
        'name' => $name,
        'class' =>
            'block w-full h-12 px-4 py-2 text-blue-500 duration-200 border rounded-lg appearance-none bg-chalk border-zinc-300 placeholder-zinc-300 focus:border-zinc-300 focus:outline-none focus:ring-zinc-300 sm:text-sm',
        'value' => $value ?? old($name),
    ];
@endphp

<input {{ $attributes($defaults) }}>
