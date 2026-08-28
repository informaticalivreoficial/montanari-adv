<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Área do Cliente' }} · {{ $configuracoes->app_name }}</title>

    @vite(['resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body { font-family: 'Inter', system-ui, -apple-system, sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-slate-950 text-slate-100 antialiased">
    <div class="relative flex min-h-screen items-center justify-center overflow-hidden px-4 py-12">
        {{-- Brilhos decorativos --}}
        <div class="pointer-events-none absolute -right-32 -top-32 h-96 w-96 rounded-full bg-blue-500/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-32 -left-32 h-96 w-96 rounded-full bg-blue-500/5 blur-3xl"></div>

        <div class="relative w-full max-w-md">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
