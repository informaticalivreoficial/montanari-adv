<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name', 'email', 'password', 'remember_token',
        'position', 'department', 'biography',
        'gender',
        'cpf',
        'rg',
        'rg_expedition',
        'birthday',
        'naturalness',
        'civil_status',
        'avatar',
        //Address
        'zipcode', 'street', 'number', 'complement', 'neighborhood', 'state', 'city',
        //Contact
        'phone', 'cell_phone', 'whatsapp', 'telegram', 'email', 'additional_email',
        //Social
        'facebook', 'twitter', 'instagram', 'linkedin',
        'status',
        'information'
    ];    

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function booted()
    {
        static::deleting(function ($user) {
            \App\Services\Asset::delete($user->avatar);
        });
    }

    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super-admin');
    }

    public function isManager(): bool
    {
        return $this->hasRole('manager');
    }

    public function isEmployee(): bool
    {
        return $this->hasRole('employee');
    }

    /**
     * Envia o e-mail de redefinição de senha com link correto (rota nomeada).
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Relacionamentos
    */

    /**
     * Scopes
    */
    public function scopeAvailable($query)
    {
        return $query->where('status', 1);
    }

    public function scopeUnavailable($query)
    {
        return $query->where('status', 0);
    }

    /**
     * Clientes: usuários com role "client"
    */
    public function scopeClients($query)
    {
        return $query->role('client');
    }

    /**
     * Time: usuários com roles super-admin, admin ou manager
    */
    public function scopeTeam($query)
    {
        return $query->role(['super-admin', 'admin', 'manager']);
    }

    /**
     * Verifica o tipo do usuário
    */
    public function isClient(): bool
    {
        return $this->hasRole('client');
    }

    public function isTeam(): bool
    {
        return $this->hasAnyRole(['super-admin', 'admin', 'manager']);
    }

    /**
     * Accerssors and Mutators
    */
    public function getUrlAvatarAttribute()
    {
        if (!empty($this->avatar)) {
            return \App\Services\Asset::url($this->avatar);
        }
        return '';
    }

    public function setCellPhoneAttribute($value)
    {
        $this->attributes['cell_phone'] = (!empty($value) ? $this->clearField($value) : null);
    }
    
    public function getCellPhoneAttribute($value)
    {
        if (empty($value)) {
            return null;
        }
        return  
            substr($value, 0, 0) . '(' .
            substr($value, 0, 2) . ') ' .
            substr($value, 2, 5) . '-' .
            substr($value, 7, 4) ;
    }

    public function setWhatsappAttribute($value)
    {
        $this->attributes['whatsapp'] = (!empty($value) ? $this->clearField($value) : null);
    }
    
    public function getWhatsappAttribute($value)
    {
        if (empty($value)) {
            return null;
        }
        return  
            substr($value, 0, 0) . '(' .
            substr($value, 0, 2) . ') ' .
            substr($value, 2, 5) . '-' .
            substr($value, 7, 4) ;
    }

    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = (!empty($value) ? $this->convertStringToDate($value) : null);
    }

    public function getBirthdayAttribute($value)
    {
        if (empty($value)) {
            return null;
        }
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    public function setZipcodeAttribute($value)
    {
        $this->attributes['zipcode'] = (!empty($value) ? $this->clearField($value) : null);
    }

    public function getZipcodeAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return substr($value, 0, 5) . '-' . substr($value, 5, 3);
    }

    private function convertStringToDouble(?string $param)
    {
        if (empty($param)) {
            return null;
        }

        return str_replace(',', '.', str_replace('.', '', $param));
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
