@props(['href'])

<a href='{{ $href }}' class="bg-teal-dark cursor-pointer font-semibold py-1 px-4 text-gray-300">
    {{ $slot }}
</a>
