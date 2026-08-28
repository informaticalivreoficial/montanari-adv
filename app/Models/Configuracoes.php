<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Configuracoes extends Model
{
    use HasFactory;

    protected $table = 'config';

    protected $fillable = [
        'status',
        'init_date',
        'app_name',
        'social_name',
        'alias_name',
        'slug',
        'cnpj',
        'ie',
        'domain',
        'subdomain',
        'template',

        //Images
        'logo',
        'logo_admin',
        'logo_footer',
        'favicon',
        'metaimg',
        'imgheader',
        'watermark',

        //contact
        'phone',
        'cell_phone',
        'whatsapp',
        'telegram',
        'email',
        'additional_email',

        //Address
        'display_address', 'zipcode', 'street', 'number', 'complement', 'neighborhood', 'state', 'city',

        //Social
        'facebook', 'twitter', 'instagram', 'youtube', 'linkedin',

        //Seo
        'information',
        'privacy_policy',
        'terms_conditions',
        'cookies_preference',
        'maps_google',
        'metatags', 'rss',
        'rss_data',
        'sitemap',
        'sitemap_data',
        'analytics_id'
    ];

    /**
     * Accerssors and Mutators
     */
    protected function mediaUrl(?string $field): string
    {
        $placeholder = url(asset('theme/images/image.jpg'));

        if (empty($field)) {
            return $placeholder;
        }

        return \App\Services\Asset::url($field);
    }

    public function getmetaimg()
    {
        return $this->mediaUrl($this->metaimg);
    }

    public function getlogo()
    {
        return $this->mediaUrl($this->logo);
    }

    public function getlogoadmin()
    {
        return $this->mediaUrl($this->logo_admin);
    }

    public function getfaveicon()
    {
        return $this->mediaUrl($this->favicon);
    }

    public function getwatermark()
    {
        return $this->mediaUrl($this->watermark);
    }

    public function getheadersite()
    {
        return $this->mediaUrl($this->imgheader);
    }

    public function getlogofooter()
    {
        return $this->mediaUrl($this->logo_footer);
    }

    public function setZipcodeAttribute($value)
    {
        $this->attributes['zipcode'] = (!empty($value) ? $this->clearField($value) : null);
    }

    public function setWhatsappAttribute($value)
    {
        $this->attributes['whatsapp'] = (!empty($value) ? $this->clearField($value) : null);
    }

    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = (!empty($value) ? $this->clearField($value) : null);
    }

    public function setCellPhoneAttribute($value)
    {
        $this->attributes['cell_phone'] = (!empty($value) ? $this->clearField($value) : null);
    }

    public function setDisplayAddressAttribute($value)
    {
        $this->attributes['display_address'] = ($value == true || $value == '1' ? 1 : 0);
    }

    private function convertStringToDate(?string $param)
    {
        if (empty($param)) {
            return null;
        }
        list($day, $month, $year) = explode('/', $param);
        return (new \DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
    }

    private function clearField(?string $param)
    {
        if (empty($param)) {
            return null;
        }
        return str_replace(['.', '-', '/', '(', ')', ' '], '', $param);
    }
}
