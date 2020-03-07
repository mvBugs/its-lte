<?php

namespace App\Http\Resources;

use App\Driver;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderConfimed extends JsonResource
{
    /**
     * Transform the resource into an array.
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
        $token = request()->header('accept-token');
        $driver = Driver::where('api_token', $token)->first();

        return [
            'balance' => $driver->balance
        ];
    }
}
