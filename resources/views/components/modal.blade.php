@props(['id'])

<div id='{{ $id }}' class="fixed inset-0 bg-gray-600 bg-opacity-50  items-center justify-center hidden">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md ">
        {{ $slot }}
    </div>
</div>
