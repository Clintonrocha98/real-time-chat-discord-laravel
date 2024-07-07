<div class="text-white mb-2 mt-3 px-4 flex justify-between border-b border-gray-600 py-1 shadow-xl">
    <div class="flex-auto">
        <h1 class="font-semibold text-xl leading-tight mb-1 truncate">
            {{ $slot }}
        </h1>
    </div>

    <div>
        @if (!empty($del))
            {{ $del }}
        @endif
    </div>

</div>
