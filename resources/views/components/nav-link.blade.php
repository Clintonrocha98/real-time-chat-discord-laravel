<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-white font-bold text-xl">
            Discord Chat
        </div>
        <div class="flex space-x-4">
            @guest
                <a href="/login" class="text-white">Login</a>
                <a href="/register" class="text-white">Register</a>
            @else
                <x-form.form method="POST" action="/logout">
                    <button type="submit" class="text-white">Logout</button>
                </x-form.form>
            @endguest
        </div>
    </div>
</nav>
