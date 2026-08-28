<x-mail::message>
# Olá, {{ $userName }}! 👋

Você solicitou um **link de acesso** à Área do Cliente.

Clique no botão abaixo para entrar. O link é válido por **15 minutos**.

<x-mail::button :url="$magicLinkUrl" color="primary">
    Acessar Área do Cliente
</x-mail::button>

Se você não solicitou este ignore este e-mail.

Atenciosamente,<br>
{{ config('app.name') }}
</x-mail::message>
