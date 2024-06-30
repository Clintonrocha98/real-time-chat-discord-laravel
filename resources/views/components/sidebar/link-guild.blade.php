@props(['href'])

<x-link class="cursor-pointer mb-4" href='{{ $href }}'>
    <div
        class="bg-white h-12 w-12 flex items-center justify-center text-black text-2xl font-semibold rounded-xl mb-1 overflow-hidden">
        <img src="https://cdn.discordapp.com/embed/avatars/0.png" alt="" />
    </div>
</x-link>

{{-- rounded-3xl: guild atual --}}
{{-- rounded-xl --}}
