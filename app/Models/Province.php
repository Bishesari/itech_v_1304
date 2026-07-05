<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{

    /**
     * @return HasMany<City, $this>
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    /**
     * پروفایل‌هایی که محل سکونتشان این استان است.
     *
     * @return HasMany<Profile, $this>
     */

    public function profiles(): HasMany
    {
        return $this->hasMany(Profile::class);
    }

    /**
     * پروفایل‌هایی که محل تولدشان این استان است.
     *
     * @return HasMany<Profile, $this>
     */
    public function birthProfiles(): HasMany
    {
        return $this->hasMany(Profile::class, 'birth_province_id');
    }

}
