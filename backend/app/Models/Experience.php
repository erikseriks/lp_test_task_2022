<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Experience extends Model
{
    /**
     * @inheriDoc
     */
    protected $fillable = [
        'name',
        'position',
        'work_load',
        'start_year',
        'start_month',
        'end_year',
        'end_month',
    ];

    /**
     * @return HasMany
     */
    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }
}
