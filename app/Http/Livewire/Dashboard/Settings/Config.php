<?php

namespace App\Http\Livewire\Dashboard\Settings;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Configuracoes;
use App\Traits\HasAlerts;
use App\Services\ImageService;
use Illuminate\Support\Facades\Storage;

class Config extends Component
{
    use HasAlerts, WithFileUploads;

    // Geral
    public $app_name = '', $social_name = '', $alias_name = '', $slug = '';
    public $init_date = '', $domain = '', $subdomain = '', $template = '';
    public $cnpj = '', $ie = '';
    public $status = 1;

    // Contato
    public $phone = '', $cell_phone = '', $whatsapp = '', $telegram = '';
    public $email = '', $additional_email = '';

    // Endereço
    public $display_address = false;
    public $zipcode = '', $street = '', $number = '', $complement = '';
    public $neighborhood = '', $state = '', $city = '';

    // Redes Sociais
    public $facebook = '', $twitter = '', $instagram = '', $youtube = '', $linkedin = '';

    // SEO
    public $information = '', $privacy_policy = '', $terms_conditions = '';
    public $cookies_preference = '', $metatags = '', $analytics_id = '';
    public $maps_google = '';
    public $rss = false, $rss_data = '';
    public $sitemap = false, $sitemap_data = '';

    // Imagens ( TemporaryUploadedFile )
    public $logo = null, $logo_admin = null, $logo_footer = null;
    public $favicon = null, $metaimg = null, $imgheader = null, $watermark = null;

    public function mount()
    {
        $this->loadConfig();
    }

    public function loadConfig()
    {
        $config = Configuracoes::find(1);
        if (!$config) return;

        $fields = [
            'app_name', 'social_name', 'alias_name', 'slug', 'init_date',
            'domain', 'subdomain', 'template', 'cnpj', 'ie', 'status',
            'phone', 'cell_phone', 'whatsapp', 'telegram', 'email', 'additional_email',
            'display_address', 'zipcode', 'street', 'number', 'complement',
            'neighborhood', 'state', 'city',
            'facebook', 'twitter', 'instagram', 'youtube', 'linkedin',
            'information', 'privacy_policy', 'terms_conditions', 'cookies_preference',
            'metatags', 'analytics_id', 'maps_google',
            'rss', 'rss_data', 'sitemap', 'sitemap_data',
        ];

        foreach ($fields as $field) {
            $this->{$field} = $config->{$field} ?? ($this->{$field});
        }
    }

    public function updatedDisplayAddress($value)
    {
        $this->display_address = (bool) $value;
    }

    public function updatedRss($value)
    {
        $this->rss = (bool) $value;
    }

    public function updatedSitemap($value)
    {
        $this->sitemap = (bool) $value;
    }

    /**
     * Auto-complete de endereço via CEP
     */
    public function updatedZipcode($value)
    {
        $cep = preg_replace('/\D/', '', $value);
        if (strlen($cep) === 8) {
            $this->autoCompleteAddress($cep);
        }
    }

    protected function autoCompleteAddress($cep)
    {
        $response = @file_get_contents("https://viacep.com.br/ws/{$cep}/json/");
        if ($response) {
            $data = json_decode($response, true);
            if (!isset($data['erro'])) {
                $this->street = $data['logradouro'] ?? '';
                $this->neighborhood = $data['bairro'] ?? '';
                $this->city = $data['localidade'] ?? '';
                $this->state = $data['uf'] ?? '';
                $this->complement = $data['complemento'] ?? '';
            }
        }
    }

    public function update()
    {
        $this->validate([
            'app_name'         => 'required|string|max:255',
            'social_name'      => 'nullable|string|max:255',
            'alias_name'       => 'nullable|string|max:255',
            'slug'             => 'nullable|string|max:255',
            'init_date'        => 'nullable|integer|min:1900|max:' . date('Y'),
            'domain'           => 'nullable|string|max:255',
            'subdomain'        => 'nullable|string|max:255',
            'template'         => 'nullable|string|max:255',
            'cnpj'             => 'nullable|string|max:20',
            'ie'               => 'nullable|string|max:20',
            'phone'            => 'nullable|string|max:255',
            'cell_phone'       => 'nullable|string|max:255',
            'whatsapp'         => 'nullable|string|max:255',
            'telegram'         => 'nullable|string|max:255',
            'email'            => 'nullable|email|max:255',
            'additional_email' => 'nullable|email|max:255',
            'zipcode'          => 'nullable|string|max:10',
            'street'           => 'nullable|string|max:255',
            'number'           => 'nullable|string|max:20',
            'complement'       => 'nullable|string|max:255',
            'neighborhood'     => 'nullable|string|max:255',
            'state'            => 'nullable|string|max:2',
            'city'             => 'nullable|string|max:255',
            'facebook'         => 'nullable|url|max:255',
            'twitter'          => 'nullable|url|max:255',
            'instagram'        => 'nullable|url|max:255',
            'youtube'          => 'nullable|url|max:255',
            'linkedin'         => 'nullable|url|max:255',
            'information'      => 'nullable|string',
            'privacy_policy'   => 'nullable|string',
            'terms_conditions' => 'nullable|string',
            'cookies_preference' => 'nullable|string',
            'metatags'         => 'nullable|string',
            'analytics_id'     => 'nullable|string|max:255',
            'maps_google'      => 'nullable|string',
            'rss_data'         => 'nullable|string',
            'sitemap_data'     => 'nullable|string',

            // Imagens — aceita UploadedFile do Livewire
            'logo'       => 'nullable|image|max:2048',
            'logo_admin' => 'nullable|image|max:2048',
            'logo_footer' => 'nullable|image|max:2048',
            'favicon'    => 'nullable|image|max:1024',
            'metaimg'    => 'nullable|image|max:4096',
            'imgheader'  => 'nullable|image|max:4096',
            'watermark'  => 'nullable|image|max:4096',
        ], [
            'app_name.required' => 'O nome do sistema é obrigatório.',
            'email.email'       => 'E-mail inválido.',
            'facebook.url'      => 'URL do Facebook inválida.',
            'twitter.url'       => 'URL do Twitter inválida.',
            'instagram.url'     => 'URL do Instagram inválida.',
            'youtube.url'       => 'URL do YouTube inválida.',
            'linkedin.url'      => 'URL do LinkedIn inválida.',
            'logo.image'        => 'O arquivo da logo deve ser uma imagem.',
            'logo.max'          => 'Logo muito grande. Máximo: 2MB.',
            'favicon.image'     => 'O arquivo do favicon deve ser uma imagem.',
            'favicon.max'       => 'Favicon muito grande. Máximo: 1MB.',
            'metaimg.image'     => 'O arquivo deve ser uma imagem.',
            'metaimg.max'       => 'Imagem muito grande. Máximo: 4MB.',
            'imgheader.image'   => 'O arquivo deve ser uma imagem.',
            'imgheader.max'     => 'Imagem muito grande. Máximo: 4MB.',
            'watermark.image'   => 'O arquivo deve ser uma imagem.',
            'watermark.max'     => 'Imagem muito grande. Máximo: 4MB.',
        ]);

        $config = Configuracoes::firstOrCreate(['id' => 1]);

        // Salvar campos de texto
        $fields = [
            'app_name', 'social_name', 'alias_name', 'slug', 'init_date',
            'domain', 'subdomain', 'template', 'cnpj', 'ie', 'status',
            'phone', 'cell_phone', 'whatsapp', 'telegram', 'email', 'additional_email',
            'display_address', 'zipcode', 'street', 'number', 'complement',
            'neighborhood', 'state', 'city',
            'facebook', 'twitter', 'instagram', 'youtube', 'linkedin',
            'information', 'privacy_policy', 'terms_conditions', 'cookies_preference',
            'metatags', 'analytics_id', 'maps_google',
            'rss', 'rss_data', 'sitemap', 'sitemap_data',
        ];

        foreach ($fields as $field) {
            if ($this->{$field} !== null && $this->{$field} !== '') {
                $config->{$field} = $this->{$field};
            }
        }

        // Upload de imagens via ImageService
        $imageService = new ImageService();
        $imageFields = ['logo', 'logo_admin', 'logo_footer', 'favicon', 'metaimg', 'imgheader', 'watermark'];

        $uploadErrors = [];

        foreach ($imageFields as $field) {
            if ($this->{$field} && is_object($this->{$field})) {
                // Remove imagem antiga (local ou R2)
                if (!empty($config->{$field})) {
                    \App\Services\Asset::delete($config->{$field});
                }

                try {
                    $result = $imageService->convertToWebp($this->{$field}, 'config');
                    $config->{$field} = $result['path'];
                } catch (\Throwable $e) {
                    $uploadErrors[] = "{$field}: " . $e->getMessage();
                }
            }
        }

        $config->save();

        $this->loadConfig();
        $this->resetImages();

        // Feedback via SweetAlert2
        if (!empty($uploadErrors)) {
            $errorMsg = "Configurações salvas, mas houve erro no upload:\n" . implode("\n", $uploadErrors);
            $this->alertError($errorMsg);
        } else {
            $this->alertSuccess('Configurações salvas com sucesso!');
        }
    }

    protected function resetImages(): void
    {
        $this->logo = null;
        $this->logo_admin = null;
        $this->logo_footer = null;
        $this->favicon = null;
        $this->metaimg = null;
        $this->imgheader = null;
        $this->watermark = null;
    }

    public function getImageUrl($field): ?string
    {
        $config = Configuracoes::find(1);
        if (!$config || empty($config->{$field})) {
            return asset('theme/images/image.jpg');
        }
        return \App\Services\Asset::url($config->{$field});
    }

    public function render()
    {
        $config = Configuracoes::find(1);
        return view('livewire.dashboard.Settings.config', compact('config'))
            ->layout('layouts.admin', ['title' => 'Configurações']);
    }
}
