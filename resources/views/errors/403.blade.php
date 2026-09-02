<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acesso Negado · Montanari Adv</title>

    @vite(['resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen bg-gray-50 flex items-center justify-center px-4">
    <div class="max-w-md w-full text-center">

        {{-- Ícone --}}
        <div class="mb-6 inline-flex h-20 w-20 items-center justify-center rounded-full bg-red-100">
            <i class="fa-solid fa-shield-halved text-4xl text-red-500"></i>
        </div>

        {{-- Código --}}
        <h1 class="text-7xl font-black text-gray-900">403</h1>

        {{-- Título --}}
        <h2 class="mt-4 text-2xl font-bold text-gray-900">Acesso Negado</h2>

        {{-- Descrição --}}
        <p class="mt-3 text-gray-500">
            Você não tem permissão para acessar esta página.<br>
            Se acha que isto é um erro, entre em contato com o administrador.
        </p>

        {{-- Botões --}}
        <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-3">
            <a
                href="{{ route('dashboard') }}"
                class="inline-flex items-center gap-2 rounded-lg bg-amber-500 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-600"
            >
                <i class="fa-solid fa-house text-xs"></i>
                Voltar ao Painel
            </a>
            <a
                href="javascript:history.back()"
                class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-6 py-3 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50"
            >
                <i class="fa-solid fa-arrow-left text-xs"></i>
                Voltar
            </a>
        </div>
    </div>
</body>
</html>
