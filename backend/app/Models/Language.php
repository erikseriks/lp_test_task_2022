<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /**
     * @inheriDoc
     */
    protected $fillable = [
        'name',
        'listening',
        'reading',
        'talking',
        'writing',
    ];
}
