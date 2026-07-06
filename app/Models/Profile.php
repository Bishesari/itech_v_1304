<?php

namespace App\Models;

use App\Enums\EducationLevel;
use App\Enums\Gender;
use App\Enums\IdentifierType;
use App\Enums\MaritalStatus;
use App\Enums\MilitaryStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];
    protected function casts(): array
    {
        return [
            'identifier_type' => IdentifierType::class,
            'gender' => Gender::class,
            'marital_status' => MaritalStatus::class,
            'military_status' => MilitaryStatus::class,
            'education_level' => EducationLevel::class,
            'birth_date' => 'date',
        ];
    }

    /**
     * @return BelongsTo<Province, $this>
     */

    // Current location
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    /**
     * @return BelongsTo<City, $this>
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    /**
     * @return BelongsTo<Province, $this>
     */
    // Birth location
    public function birthProvince(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'birth_province_id');
    }

    /**
     * @return BelongsTo<City, $this>
     */
    public function birthCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'birth_city_id');
    }

    /**
     * @return BelongsToMany<Contact, $this, ContactProfile, 'pivot'>
     */
    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class)
            ->using(ContactProfile::class)
            ->withPivot(['role', 'is_primary'])
            ->withTimestamps();
    }


    /**
     * @return HasOne<User, $this>
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
