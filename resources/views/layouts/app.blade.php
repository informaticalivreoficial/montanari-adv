<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Montanari Adv - Sistema de Advocacia</title>

        <!-- Estilos compilados (Vite + Tailwind v4) -->
        @vite(['resources/js/app.js'])

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body class="min-h-screen bg-gray-100">

        {{ $slot }}

    </body>
</html>
