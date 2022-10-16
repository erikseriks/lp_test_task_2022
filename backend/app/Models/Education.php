<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    /**
     * @inheriDoc
     */
    protected $fillable = [
        'name',
        'faculty',
        'field',
        'level',
        'status',
        'start_year',
        'start_month',
        'end_year',
        'end_month',
    ];
}
