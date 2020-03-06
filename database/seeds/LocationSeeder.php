<?php

use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
            'name' => 'Ушарал',
            'slug' => 'usharal',
            'commission' => 10,
            ],
            [
            'name' => 'Межгород',
            'slug' => 'intercity',
            'commission' => 10,
            ],
        ];
        foreach ($data as $location) {
            \App\Location::create($location);
        }
    }
}
