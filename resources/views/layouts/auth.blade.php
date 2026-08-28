<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Acesso' }} · Montanari Adv</title>

    @vite(['resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen bg-slate-950 text-slate-100 antialiased">
    <div class="min-h-screen grid lg:grid-cols-2">

        <!-- Painel de marca -->
        <div class="relative hidden lg:flex flex-col justify-between overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 p-12">
            <div class="pointer-events-none absolute -right-24 -top-24 h-80 w-80 rounded-full bg-amber-500/10 blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-amber-500/5 blur-3xl"></div>

            <div class="relative z-10">
                <div class="flex items-center gap-3">
                    <img src="{{ $configuracoes->getlogofooter() }}" alt="Logo {{ $configuracoes->app_name }}" class="h-10 w-auto">
                </div>
            </div>

            <div class="relative z-10 max-w-md">
                <h1 class="text-3xl font-semibold leading-snug text-white">Assessoria jurídica com seriedade e excelência.</h1>
                <p class="mt-4 text-slate-400">Acesse o painel administrativo para gerenciar usuários, configurações e permissões do escritório.</p>
            </div>

            <div class="relative z-10 text-sm text-slate-500">© {{ date('Y') }} {{ $configuracoes->app_name }}. Todos os direitos reservados.</div>
        </div>

        <!-- Painel do formulário -->
        <div class="flex items-center justify-center bg-slate-50 p-6 sm:p-12">
            <div class="w-full max-w-md">
                <div class="mb-8 flex items-center justify-center gap-2 lg:hidden">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-amber-500 font-bold text-slate-900">M</div>
                    <span class="text-lg font-semibold text-slate-900">{{ $configuracoes->app_name }}</span>
                </div>

                {{ $slot }}
            </div>
        </div>

    </div>
</body>
</html>
