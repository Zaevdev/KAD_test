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
    protected $table = 'сurrencies';
    protected $guarded = false;
    protected $fillable = [
        'id_cbr',
        'name',
        'english_name',
        'alphabetic_code',
        'digit_code',
        'rate',
    ];
}
