@props(['href', 'isCurrent'])

<x-link class="cursor-pointer mb-4 relative flex justify-center w-[72px]" href='{{ $href }}'>
    @if ($isCurrent)
        <div class="absolute left-0  w-2 h-12 bg-white rounded-xl ml-[-8px] opacity-85">
        </div>
    @endif
    <div
        class="{{ $isCurrent ? 'rounded-xl' : 'rounded-3xl' }} flex bg-white h-12 w-12 items-center justify-center text-black text-2xl font-semibold mb-1 overflow-hidden hover:rounded-xl">

        @if ($isCurrent)
            <img src="https://cdn.discordapp.com/embed/avatars/4.png" alt="icon discord" />
        @else
            <img src="https://cdn.discordapp.com/embed/avatars/0.png" alt="icon discord" />
        @endif
    </div>
</x-link>
