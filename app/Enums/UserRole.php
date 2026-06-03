<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin';
    case Guest = 'guest';

    public function label(): string
    {
        return match ($this) {
            self::Admin => 'Administrator',
            self::Guest => 'Guest User',
        };
    }

    public function isAdmin(): bool
    {
        return $this === self::Admin;
    }
}
