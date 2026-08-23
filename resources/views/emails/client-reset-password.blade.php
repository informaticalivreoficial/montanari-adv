<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Redefinição de senha</title>
</head>
<body style="margin:0; padding:0; background-color:#f3f4f6;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f3f4f6; padding:24px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:560px; width:100%; background-color:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 4px 14px rgba(0,0,0,0.06);">

                    {{-- Header --}}
                    <tr>
                        <td style="background-color:#23406C; padding:26px 28px; text-align:center;">
                            @if(isset($configuracoes) && method_exists($configuracoes, 'getlogo'))
                                <img src="{{ $configuracoes->getlogo() }}" alt="Montanari Advocacia" style="height:34px; width:auto;">
                            @else
                                <span style="color:#ffffff; font-size:18px; font-weight:700; font-family:Arial, Helvetica, sans-serif;">Montanari Advocacia</span>
                            @endif
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="padding:32px 28px; font-family:Arial, Helvetica, sans-serif; color:#374151;">
                            <p style="margin:0 0 16px; font-size:16px;">
                                Olá, <strong style="color:#111827;">{{ $name ?? 'cliente' }}</strong>,
                            </p>
                            <p style="margin:0 0 20px; font-size:15px; line-height:1.6;">
                                Recebemos uma solicitação para redefinir a senha da sua conta na
                                <strong>Área do Cliente</strong> do Montanari Advocacia.
                            </p>

                            {{-- Botão --}}
                            <table role="presentation" cellpadding="0" cellspacing="0" style="margin:8px 0 24px;">
                                <tr>
                                    <td style="border-radius:8px; background-color:#23406C;">
                                        <a href="{{ $url }}" style="display:inline-block; padding:13px 30px; font-family:Arial, Helvetica, sans-serif; font-size:15px; font-weight:700; color:#ffffff; text-decoration:none; border-radius:8px;">
                                            Redefinir senha
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin:0 0 12px; font-size:14px; color:#6b7280;">
                                Este link de redefinição expira em <strong>60 minutos</strong>.
                            </p>
                            <p style="margin:0; font-size:14px; color:#6b7280;">
                                Se você não solicitou essa alteração, ignore este e-mail e nenhuma mudança será feita.
                            </p>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="background-color:#f9fafb; padding:18px 28px; text-align:center; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#9ca3af; line-height:1.5;">
                            Montanari Advocacia · Área do Cliente<br>
                            Sistema desenvolvido por {{ env('DESENVOLVEDOR') }}
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
