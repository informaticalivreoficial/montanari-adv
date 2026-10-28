<?php

namespace Tests\Feature\Web;

use Tests\TestCase;
use App\Mail\Web\Atendimento;
use App\Http\Livewire\Web\ContactForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Evita chamadas reais ao Telegram durante os testes.
        Http::fake();

        config([
            'mail.from.address' => 'atendimento@montanariadvocacia.com.br',
            'mail.from.name' => 'Moura & Montanari Advocacia',
            'mail.contact_to' => 'atendimento@montanariadvocacia.com.br',
        ]);
    }

    public function test_submit_vazio_retorna_erros_de_validacao(): void
    {
        Mail::fake();

        Livewire::test(ContactForm::class)
            ->call('send')
            ->assertHasErrors(['nome', 'email', 'mensagem']);

        Mail::assertNothingSent();
    }

    public function test_envia_mensagem_valida(): void
    {
        Mail::fake();

        Livewire::test(ContactForm::class)
            ->set('nome', 'Fulano de Tal')
            ->set('email', 'fulano@example.com')
            ->set('mensagem', 'Gostaria de agendar uma consulta.')
            ->call('send')
            ->assertHasNoErrors()
            ->assertSet('sent', true);

        Mail::assertSent(Atendimento::class, function (Atendimento $mail) {
            return $mail->build()->hasTo('atendimento@montanariadvocacia.com.br');
        });
    }

    public function test_honeypot_responde_com_sucesso_sem_enviar(): void
    {
        Mail::fake();

        Livewire::test(ContactForm::class)
            ->set('nome', 'Bot Qualquer')
            ->set('email', 'bot@example.com')
            ->set('mensagem', 'Mensagem automática de spam.')
            ->set('bairro', 'Centro')
            ->call('send')
            ->assertSet('sent', true);

        Mail::assertNothingSent();
    }

    public function test_bloqueia_apos_tres_tentativas(): void
    {
        Mail::fake();

        for ($i = 0; $i < 3; $i++) {
            Livewire::test(ContactForm::class)
                ->set('nome', 'Fulano de Tal')
                ->set('email', 'fulano@example.com')
                ->set('mensagem', 'Mensagem número ' . $i . ' para teste.')
                ->call('send')
                ->assertHasNoErrors();
        }

        Livewire::test(ContactForm::class)
            ->set('nome', 'Fulano de Tal')
            ->set('email', 'fulano@example.com')
            ->set('mensagem', 'Quarta mensagem em menos de dez minutos.')
            ->call('send')
            ->assertHasErrors(['mensagem']);

        Mail::assertSent(Atendimento::class, 3);
    }
}
