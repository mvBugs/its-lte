<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (string) $this->id,
            'price' => (string) $this->price,
            'time' => (string) $this->time,
            'from_street' => (string) $this->from_street,
            'from_house' => (string) $this->from_house,
            'from_entrance' => (string) $this->from_entrance,
            'to_street' => (string) $this->to_street,
            'to_house' => (string) $this->to_house,
            'to_entrance' => (string) $this->to_entrance,
            'comment' => (string) $this->comment,
            'city_type' => (string) $this->city_type,
            'status' => (string) $this->status,
            'phone' => (string) $this->phone,
            'driver_id' => (string) $this->driver_id,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at
        ];
    }
}
