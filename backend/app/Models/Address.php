<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * @inheriDoc
     */
    protected $fillable = [
        'country',
        'index',
        'city',
        'street',
        'number',
    ];
}
