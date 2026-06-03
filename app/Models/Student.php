<?php

namespace App\Models;

use Database\Factories\StudentFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[Fillable([
    'student_id',
    'full_name',
    'address',
    'phone',
    'email',
    'photo',
    'gender',
    'date_of_birth',
])]
class Student extends Model
{
    /** @use HasFactory<StudentFactory> */
    use HasFactory;

    public const DEFAULT_AVATAR = '/images/default-avatar.svg';

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
        ];
    }

    protected function photoUrl(): Attribute
    {
        return Attribute::get(function (): ?string {
            if (! $this->hasPhoto()) {
                return null;
            }

            return '/storage/'.ltrim($this->photo, '/');
        });
    }

    protected function initials(): Attribute
    {
        return Attribute::get(function (): string {
            $parts = explode(' ', trim($this->full_name));
            $initials = '';

            foreach (array_slice($parts, 0, 2) as $part) {
                $initials .= strtoupper(substr($part, 0, 1));
            }

            return $initials ?: 'ST';
        });
    }

    public function hasPhoto(): bool
    {
        if (blank($this->photo)) {
            return false;
        }

        return Storage::disk('public')->exists($this->photo);
    }

    public function defaultAvatarUrl(): string
    {
        return self::DEFAULT_AVATAR;
    }
}
