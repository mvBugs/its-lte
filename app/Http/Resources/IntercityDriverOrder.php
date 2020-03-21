<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IntercityDriverOrder extends JsonResource
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
            'id' => $this->id,
            'city_id_to' => (string) $this->toCity->name,
            'city_id_from' => (string) $this->fromCity->name,
            'date' => (string) $this->date->format('Y-m-d'),
            'time' => (string) $this->date->format('H:i'),
            'price' => (string) $this->price,
            'phone' => (string) $this->phone,
            'comment' => (string) $this->comment,
            'car_model' => $this->driver->car_model,
            'car_number' => $this->driver->car_number,
            'car_color' => $this->driver->car_color
        ];
    }

    public function with($request)
    {
        if ($driver = auth_driver()) {
            return [
                'balance' => $driver->balance
            ];
        }
        return [];
    }
}
