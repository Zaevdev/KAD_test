<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property false|mixed|\SimpleXMLElement|null $name
 * @property mixed|string|null $english_name
 * @property false|mixed|\SimpleXMLElement|null $alphabetic_code
 * @property false|mixed|\SimpleXMLElement|null $digit_code
 * @property float|mixed $rate
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
