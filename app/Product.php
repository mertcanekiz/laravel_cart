<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Product extends Eloquent
{
    protected $fillable = [
        'title', 'description', 'image_url'
    ];

    public function prices() {
        return $this->embedsMany('App\Price');
    }
}
