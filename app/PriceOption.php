<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class PriceOption extends Eloquent
{
    protected $fillable = [
        'type', 'text', 'value'
    ];

    public function price() {
        return $this->belongsToMany('App\Price');
    }
}
