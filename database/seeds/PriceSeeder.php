<?php

use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Price::truncate();
        $cities = \App\City::all();

        foreach ($cities as $cityTo) {
            foreach ($cities as $cityFrom) {
                if (
                    !\App\Price::where(function ($query) use ($cityTo, $cityFrom) {
                    $query->where('city_id_to', $cityTo->id)->where('city_id_from', $cityFrom->id);
                })->orWhere(function ($query) use ($cityTo, $cityFrom) {
                    $query->where('city_id_to', $cityFrom->id)->where('city_id_from', $cityTo->id);
                })->first()
                    && $cityTo->id != $cityFrom->id
                ) {
                    \App\Price::create([
                        'city_id_to' => $cityTo->id,
                        'city_id_from' => $cityFrom->id,
                        'price' => 0
                    ]);
                }
            }
        }
    }
}
