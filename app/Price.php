<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $guarded = ['id'];

    public function fromCity()
    {
        return $this->belongsTo(City::class, 'city_id_from');
    }

    public function toCity()
    {
        return $this->belongsTo(City::class, 'city_id_to');
    }
}
