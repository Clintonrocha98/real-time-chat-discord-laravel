<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Discord chat</title>



</head>

<body class="bg-gray-100">
    {{ $slot }}
    <script>
        function openModal(name) {
            const modal = document.getElementById(name);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal(name) {
            const modal = document.getElementById(name);
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }

        function scrollToBottom() {
            var chat = document.getElementById('chatMenssages');
            chat.scrollTop = chat.scrollHeight;
        }

        // Chamar a função quando a página carregar
        window.onload = scrollToBottom;
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</body>


</html>
