@props(['name', 'time', 'content'])
<div class="border-b border-gray-600 py-3 flex items-start  text-sm">
    <img src="https://cdn.discordapp.com/embed/avatars/0.png" class="cursor-pointer w-10 h-10 rounded-3xl mr-3" />
    <div class="flex-1 overflow-hidden">
        <div>
            <span class="font-bold text-red-300 cursor-pointer hover:underline">{{ $name }}</span>
            <span class="font-bold text-gray-400 text-xs">{{ $time }}</span>
        </div>
        <p class="text-white leading-normal">{{ $content }}</p>
    </div>
</div>
