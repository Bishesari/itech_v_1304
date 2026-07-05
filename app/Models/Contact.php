<?php

namespace App\Models;

use App\Enums\ContactType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contact extends Model
{

    /**
     * چون اعتبارسنجی در Service انجام می‌شود،
     * همه فیلدها قابل مقداردهی هستند.
     *
     * @var list<string>
     */
    protected $guarded = [];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'type' => ContactType::class,
            'is_verified' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    /**
     * @return BelongsToMany<Profile, $this, ContactProfile, 'pivot'>
    */
    public function profiles(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class)
            ->using(ContactProfile::class)
            ->withPivot(['role', 'is_primary'])
            ->withTimestamps();
    }


    public function getTypeLabelAttribute(): string
    {
        return ContactType::from((int) $this->type)->label();
    }

}
