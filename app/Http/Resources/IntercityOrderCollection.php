<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class IntercityOrderCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function with($request)
    {
        $data['active_orders'] = false;
        if ($driver = auth_driver()) {
            if ($driver->orders()->where('date', '>', Carbon::now())->first()) {
                $data['active_orders'] = true;
            }
        }
        return $data;
    }
}
