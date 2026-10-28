<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use App\Models\Configuracoes;
use App\Models\User;
use App\Mail\Web\Atendimento;
use App\Notifications\System\ContactFormNotification;
use App\Services\TelegramService;

class ContactForm extends Component
{
    public $nome = '';
    public $email = '';
    public $mensagem = '';

    // Honeypot fields
    public $bairro = '';
    public $cidade = '';

    public $sent = false;
    public $sending = false;

    protected $rules = [
        'nome' => 'required|string|min:3|max:255',
        'email' => 'required|email|max:255',
        'mensagem' => 'required|string|min:10|max:5000',
    ];

    protected $messages = [
        'nome.required' => 'Por favor, informe seu nome.',
        'nome.min' => 'O nome deve ter pelo menos 3 caracteres.',
        'email.required' => 'Por favor, informe seu e-mail.',
        'email.email' => 'Informe um endereço de e-mail válido.',
        'mensagem.required' => 'Por favor, escreva sua mensagem.',
        'mensagem.min' => 'A mensagem deve ter pelo menos 10 caracteres.',
    ];

    public function updatedNome()
    {
        $this->validateOnly('nome');
    }

    public function updatedEmail()
    {
        $this->validateOnly('email');
    }

    public function updatedMensagem()
    {
        $this->validateOnly('mensagem');
    }

    public function send()
    {
        // Honeypot: bot recebe sucesso falso, sem revelar a checagem.
        if (!empty($this->bairro) || !empty($this->cidade)) {
            Log::warning('Contato: envio bloqueado pelo honeypot', [
                'ip' => request()->ip(),
            ]);

            $this->sent = true;

            return;
        }

        $this->validate();

        // No máximo 3 mensagens a cada 10 minutos por IP.
        $chave = 'contato:' . request()->ip();

        if (RateLimiter::tooManyAttempts($chave, 3)) {
            Log::warning('Contato: envio bloqueado por excesso de tentativas', [
                'ip' => request()->ip(),
            ]);

            $this->addError('mensagem', 'Você enviou várias mensagens. Aguarde alguns minutos e tente novamente.');

            return;
        }

        RateLimiter::hit($chave, 600);

        $this->sending = true;

        try {
            $configuracoes = Configuracoes::find(1);

            // Destinatário: MAIL_CONTACT_TO → e-mail das configurações → remetente.
            $destinatario = config('mail.contact_to')
                ?: ($configuracoes->email ?? null)
                ?: config('mail.from.address');

            $data = [
                'sitename' => $configuracoes->app_name ?? config('app.name'),
                'siteemail' => $destinatario,
                'reply_name' => $this->nome,
                'reply_email' => $this->email,
                'mensagem' => $this->mensagem,
            ];

            Mail::send(new Atendimento($data));

            Log::info('Contato: e-mail enviado', [
                'ip' => request()->ip(),
                'para' => $destinatario,
            ]);
        } catch (\Throwable $e) {
            Log::error('Contato: falha ao enviar e-mail', [
                'ip' => request()->ip(),
                'erro' => $e->getMessage(),
            ]);

            $this->addError('mensagem', 'Não foi possível enviar sua mensagem agora. Tente novamente ou fale com a gente pelo WhatsApp.');

            return;
        } finally {
            $this->sending = false;
        }

        // Notificação interna e Telegram são complementares: se falharem,
        // o contato já foi entregue por e-mail e o visitante não é afetado.
        try {
            $admins = User::role(['super-admin', 'admin'])->get();

            if ($admins->isNotEmpty()) {
                Notification::send($admins, new ContactFormNotification(
                    nome: $this->nome,
                    email: $this->email,
                    mensagem: $this->mensagem,
                ));
            }
        } catch (\Throwable $e) {
            Log::error('Contato: falha ao notificar administradores', [
                'erro' => $e->getMessage(),
            ]);
        }

        try {
            $telegram = new TelegramService();
            $text  = "📩 <b>Novo contato via site</b>\n\n";
            $text .= "<b>Nome:</b> {$this->nome}\n";
            $text .= "<b>E-mail:</b> {$this->email}\n";
            $text .= "<b>Mensagem:</b>\n{$this->mensagem}";
            $telegram->sendHtml($text);
        } catch (\Throwable $e) {
            Log::error('Contato: falha ao enviar Telegram', [
                'erro' => $e->getMessage(),
            ]);
        }

        $this->sent = true;
        $this->reset(['nome', 'email', 'mensagem']);
    }

    public function render()
    {
        return view('livewire.web.contact-form');
    }
}
