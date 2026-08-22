<?php

namespace App\Http\Livewire\Dashboard\Settings;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Configuracoes;
use App\Traits\HasAlerts;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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

    // Tab ativa

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

    public function update()
    {
        $this->validate([
            'app_name'  => 'required|string|max:255',
            'social_name' => 'nullable|string|max:255',
            'alias_name' => 'nullable|string|max:255',
            'slug'       => 'nullable|string|max:255',
            'init_date'  => 'nullable|integer|min:1900|max:' . date('Y'),
            'domain'     => 'nullable|string|max:255',
            'subdomain'  => 'nullable|string|max:255',
            'template'   => 'nullable|string|max:255',
            'cnpj'       => 'nullable|string|max:20',
            'ie'         => 'nullable|string|max:20',
            'phone'      => 'nullable|string|max:255',
            'cell_phone' => 'nullable|string|max:255',
            'whatsapp'   => 'nullable|string|max:255',
            'telegram'   => 'nullable|string|max:255',
            'email'      => 'nullable|email|max:255',
            'additional_email' => 'nullable|email|max:255',
            'zipcode'    => 'nullable|string|max:10',
            'street'     => 'nullable|string|max:255',
            'number'     => 'nullable|string|max:20',
            'complement' => 'nullable|string|max:255',
            'neighborhood' => 'nullable|string|max:255',
            'state'      => 'nullable|string|max:2',
            'city'       => 'nullable|string|max:255',
            'facebook'   => 'nullable|url|max:255',
            'twitter'    => 'nullable|url|max:255',
            'instagram'  => 'nullable|url|max:255',
            'youtube'    => 'nullable|url|max:255',
            'linkedin'   => 'nullable|url|max:255',
            'information' => 'nullable|string',
            'privacy_policy'  => 'nullable|string',
            'terms_conditions' => 'nullable|string',
            'cookies_preference' => 'nullable|string',
            'metatags'   => 'nullable|string',
            'analytics_id' => 'nullable|string|max:255',
            'maps_google' => 'nullable|string',
            'rss_data'   => 'nullable|string',
            'sitemap_data' => 'nullable|string',

            // Imagens
            'logo'       => 'nullable|image|max:2048',
            'logo_admin' => 'nullable|image|max:2048',
            'logo_footer' => 'nullable|image|max:2048',
            'favicon'    => 'nullable|image|max:1024',
            'metaimg'    => 'nullable|image|max:4096',
            'imgheader'  => 'nullable|image|max:4096',
            'watermark'  => 'nullable|image|max:4096',
        ]);

        $config = Configuracoes::firstOrCreate(['id' => 1]);

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

        // Upload de imagens
        $imageFields = ['logo', 'logo_admin', 'logo_footer', 'favicon', 'metaimg', 'imgheader', 'watermark'];
        foreach ($imageFields as $field) {
            if ($this->{$field} && is_object($this->{$field})) {
                // Remove imagem antiga
                if ($config->{$field} && Storage::disk()->exists($config->{$field})) {
                    Storage::disk()->delete($config->{$field});
                }
                $config->{$field} = $this->convertToWebp($this->{$field}, 'config');
            }
        }

        $config->save();

        $this->loadConfig();
        $this->resetImages();

        $this->toastSuccess('Configurações salvas com sucesso!');
    }

    protected function convertToWebp($file, string $folder): string
    {
        $filename = uniqid() . '.webp';
        $image = Image::make($file->getRealPath());
        $image->encode('webp', 85);
        $image->save(storage_path("app/public/{$folder}/{$filename}"));
        return "{$folder}/{$filename}";
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
        return Storage::url($config->{$field});
    }

    public function render()
    {
        $config = Configuracoes::find(1);
        return view('livewire.dashboard.Settings.config', compact('config'))
            ->layout('layouts.admin', ['title' => 'Configurações']);
    }
}
