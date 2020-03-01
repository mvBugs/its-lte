<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::updateOrCreate(['email' => 'admin@app.com',],[
            'name' => 'Admin',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'email_verified_at' => new \DateTime(),
        ]);
    }
}
