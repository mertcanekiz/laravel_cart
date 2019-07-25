<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Price extends Eloquent
{
    protected $fillable = [
        'valid_from', 'valid_to', 'currency', 'original_price', 'discounted_price', 'discount_rate'
    ];

    public function options() {
        return $this->hasMany('App\PriceOption');
    }
}
