<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
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
        // Honeypot check
        if (!empty($this->bairro) || !empty($this->cidade)) {
            $this->sent = true;
            return;
        }

        $this->validate();

        $this->sending = true;

        try {
            $Configuracoes = Configuracoes::where('id', '1')->first();

            // 1. E-mail (já existia)
            $data = [
                'sitename' => $Configuracoes->app_name ?? 'Montanari Advocacia',
                'siteemail' => $Configuracoes->email ?? '',
                'reply_name' => $this->nome,
                'reply_email' => $this->email,
                'mensagem' => $this->mensagem,
            ];

            Mail::send(new Atendimento($data));

            // 2. Notificação BD + E-mail para admins
            $admins = User::role(['super-admin', 'admin'])->get();
            Notification::send($admins, new ContactFormNotification(
                nome: $this->nome,
                email: $this->email,
                mensagem: $this->mensagem,
            ));

            // 3. Telegram
            $telegram = new TelegramService();
            $text  = "📩 <b>Novo contato via site</b>\n\n";
            $text .= "<b>Nome:</b> {$this->nome}\n";
            $text .= "<b>E-mail:</b> {$this->email}\n";
            $text .= "<b>Mensagem:</b>\n{$this->mensagem}";
            $telegram->sendHtml($text);

            $this->sent = true;
            $this->reset(['nome', 'email', 'mensagem']);
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'title' => 'Erro ao enviar mensagem',
                'text' => 'Tente novamente ou entre em contato por telefone.',
            ]);
        } finally {
            $this->sending = false;
        }
    }

    public function render()
    {
        return view('livewire.web.contact-form');
    }
}
