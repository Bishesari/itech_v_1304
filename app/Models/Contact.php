<?php

namespace App\Models;

use App\Enums\ContactType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contact extends Model
{
    /**
     * @return BelongsToMany<Profile, $this>
     */
    public function profiles(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class, 'contact_profile')
            ->withPivot(['role', 'is_primary'])
            ->withTimestamps();
    }

    public function getTypeLabelAttribute(): string
    {
        return ContactType::from((int) $this->type)->label();
    }

}
