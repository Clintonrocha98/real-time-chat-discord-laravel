@php
    $defaults = [
        'type' => 'submit',
        'class' =>
            'inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black',
    ];
@endphp
<button {{ $attributes($defaults) }}>
    {{ $slot }}
</button>
