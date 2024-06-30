<div class="mb-8">
    <div class="px-4 mb-2 text-white flex justify-between items-center">
        <div class="opacity-75 cursor-pointer">Canais de texto</div>
        <button title="Create a new channel" onclick="openModal('createChannel')">
            <svg class="fill-current h-5 w-5 opacity-50 cursor-pointer" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
                <path
                    d="M16 10c0 .553-.048 1-.601 1H11v4.399c0 .552-.447.601-1 .601-.553 0-1-.049-1-.601V11H4.601C4.049 11 4 10.553 4 10c0-.553.049-1 .601-1H9V4.601C9 4.048 9.447 4 10 4c.553 0 1 .048 1 .601V9h4.399c.553 0 .601.447.601 1z" />
            </svg>
        </button>
    </div>
    <div class="flex flex-col">
        {{ $slot }}
    </div>

</div>
