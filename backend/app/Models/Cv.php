<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cv extends Model
{
    /**
     * @inheriDoc
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'native_language',
    ];

    /**
     * @return HasMany
     */
    public function languages(): HasMany
    {
        return $this->hasMany(Language::class);
    }

    /**
     * @return HasMany
     */
    public function education(): HasMany
    {
        return $this->hasMany(Education::class);
    }

    /**
     * @return HasMany
     */
    public function experience(): HasMany
    {
        return $this->hasMany(Experience::class);
    }

    /**
     * @return HasMany
     */
    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    /**
     * @return HasMany
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }
}
