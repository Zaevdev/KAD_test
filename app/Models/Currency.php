<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Currency
 *
 * @mixin Builder
 */
class Currency extends Model
{
    protected $table = 'currencies';

    protected $guarded = false;

    protected $fillable = [
        'id',
        'name',
        'english_name',
        'alphabetic_code',
        'digit_code',
        'rate',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public $incrementing = false;
}
