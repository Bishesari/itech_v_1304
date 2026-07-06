<?php

namespace App\Models;

use App\Enums\ContactRole;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ContactProfile extends Pivot
{
    protected $table = 'contact_profile';
    /**
     * @var list<string>
     */
    protected $guarded = [];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'role' => ContactRole::class,
            'is_primary' => 'boolean',
        ];
    }

    /**
     * @return BelongsTo<Contact, $this>
     */
    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

    /**
     * @return BelongsTo<Profile, $this>
     */
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function isPrimary(): bool
    {
        return $this->is_primary;
    }

    public function isSelf(): bool
    {
        return $this->role === ContactRole::Self;
    }

    public function isEmergency(): bool
    {
        return $this->role === ContactRole::Emergency;
    }

    public function isFather(): bool
    {
        return $this->role === ContactRole::Father;
    }

    public function isMother(): bool
    {
        return $this->role === ContactRole::Mother;
    }

    public function isGuardian(): bool
    {
        return $this->role === ContactRole::Guardian;
    }

    public function isOffice(): bool
    {
        return $this->role === ContactRole::Office;
    }
}
