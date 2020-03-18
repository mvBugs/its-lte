<?php

use Illuminate\Database\Seeder;

class CityesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Ушарал',
            'Талдыкорган',
            'Семей',
            'Аягоз',
            'Акши',
            'Коктума',
            'Кабанбай',
            'Саркан',
            'Бесколь',
            'Казакстан',
            'Жайпак',
            'Жанама',
            'Выезд',
            'Аэропорт'
        ];

        foreach ($data as $cityName) {
            \App\City::create(['name' => $cityName]);
        }
    }
}
