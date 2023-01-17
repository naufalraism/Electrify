<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => 1,
            'name' => 'Sheila Curtis',
            'email' => 'testing@email.com',
            'password' => 'password',
            'address' => 'Jalan Manggis No. 6',
            'gender' => 'F'
        ]);
    }
}
