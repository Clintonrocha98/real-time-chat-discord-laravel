@props(['href', 'isCurrent'])


<a href='{{ $href }}'
    class="flex justify-between items-center py-1 px-4 w-full bg-teal-dark cursor-pointer font-semibold  text-gray-300 hover:bg-gray-700 {{ $isCurrent ? 'bg-gray-700' : '' }}">
    {{ $slot }}
</a>
