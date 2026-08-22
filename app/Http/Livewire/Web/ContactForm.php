<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Models\Configuracoes;
use App\Mail\Web\Atendimento;

class ContactForm extends Component
{
    public $nome = '';
    public $email = '';
    public $telefone = '';
    public $assunto = '';
    public $mensagem = '';

    // Honeypot fields
    public $bairro = '';
    public $cidade = '';

    public $sent = false;
    public $sending = false;

    protected $rules = [
        'nome' => 'required|string|min:3|max:255',
        'email' => 'required|email|max:255',
        'telefone' => 'nullable|string|max:20',
        'assunto' => 'nullable|string|max:255',
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
            // Silently reject spam
            $this->sent = true;
            return;
        }

        $this->validate();

        $this->sending = true;

        try {
            $Configuracoes = Configuracoes::where('id', '1')->first();

            $data = [
                'sitename' => $Configuracoes->app_name ?? 'Montanari Advocacia',
                'siteemail' => $Configuracoes->email ?? '',
                'reply_name' => $this->nome,
                'reply_email' => $this->email,
                'mensagem' => $this->mensagem,
            ];

            Mail::send(new Atendimento($data));

            $this->sent = true;
            $this->reset(['nome', 'email', 'telefone', 'assunto', 'mensagem']);
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao enviar mensagem. Tente novamente ou entre em contato por telefone.');
        } finally {
            $this->sending = false;
        }
    }

    public function render()
    {
        return view('livewire.web.contact-form');
    }
}
