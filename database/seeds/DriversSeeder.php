<?php

use Illuminate\Database\Seeder;

class DriversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Driver::updateOrCreate(['login' => 'driver'],[
            'phone' => '+38098074280',
            'password' => bcrypt('password'),
            'balance' => 0,
        ]);
    }
}
