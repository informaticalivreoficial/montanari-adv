<?php

namespace App\Enums;

enum UserRole: string
{
    case SuperAdmin = 'super-admin';
    case Admin      = 'admin';
    case Manager    = 'manager';
    case Employee   = 'employee';
    case Client     = 'client';

    /**
     * Label legível para exibição nos forms
     */
    public function label(): string
    {
        return match ($this) {
            self::SuperAdmin => 'Super Admin',
            self::Admin      => 'Admin',
            self::Manager    => 'Gerente',
            self::Employee   => 'Colaborador',
            self::Client     => 'Cliente',
        };
    }

    /**
     * Cor CSS para badges (Tailwind classes)
     */
    public function color(): string
    {
        return match ($this) {
            self::SuperAdmin => 'bg-purple-100 text-purple-800',
            self::Admin      => 'bg-blue-100 text-blue-800',
            self::Manager    => 'bg-indigo-100 text-indigo-800',
            self::Employee   => 'bg-teal-100 text-teal-800',
            self::Client     => 'bg-green-100 text-green-800',
        };
    }

    /**
     * Retorna o label a partir de uma string (ex: 'super-admin')
     */
    public static function getLabel(string $value): string
    {
        $case = self::tryFrom($value);

        return $case?->label() ?? ucfirst(str_replace('-', ' ', $value));
    }

    /**
     * Retorna a cor a partir de uma string
     */
    public static function getColor(string $value): string
    {
        $case = self::tryFrom($value);

        return $case?->color() ?? 'bg-gray-100 text-gray-600';
    }

    /**
     * Array associativo [valor => label] para selects
     */
    public static function toSelectArray(): array
    {
        return array_combine(
            array_column(self::cases(), 'value'),
            array_map(fn(self $case) => $case->label(), self::cases()),
        );
    }
}
