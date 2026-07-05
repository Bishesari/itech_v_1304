<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    /**
     * @return BelongsTo<Province, $this>
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
    /**
     * پروفایل‌هایی که محل سکونتشان این شهر است.
     *
     * @return HasMany<Profile, $this>
     */
    public function profiles(): HasMany
    {
        return $this->hasMany(Profile::class);
    }

    /**
     * پروفایل‌هایی که محل تولدشان این شهر است.
     *
     * @return HasMany<Profile, $this>
     */
    public function birthProfiles(): HasMany
    {
        return $this->hasMany(Profile::class, 'birth_city_id');
    }
}
