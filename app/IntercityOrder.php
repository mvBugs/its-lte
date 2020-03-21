<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IntercityOrder extends Model
{
    protected $fillable = [
        'id',
        'city_id_to',
        'city_id_from',
        'time',
        'date',
        'price',
        'phone',
        'comment',
        'driver_id',
        'status',
        'user_type',
    ];

    protected $dates = [ 'date' ];

    public function fromCity()
    {
        return $this->belongsTo(City::class, 'city_id_from');
    }

    public function toCity()
    {
        return $this->belongsTo(City::class, 'city_id_to');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
