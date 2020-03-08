<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'price',
        'time',
        'from_street',
        'from_house',
        'from_entrance',
        'to_street',
        'to_house',
        'to_entrance',
        'comment',
        'city_type',
        'status',
        'phone'
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
