<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      User::insert([
         [
            'id' => 1,
            'role_id' => 1,
            'name' => 'Test User',
            'phone_number' => '081221455672',
            'profile_picture' => '/images/user/profile1.jpg',
            'email' => 'test.user@email.com',
            'password' => Hash::make('password'),
            'address' => 'Jalan Manggis No. 6',
            'gender' => 'F'
         ],
         [
            'id' => 2,
            'role_id' => 1,
            'name' => 'Test Admin',
            'phone_number' => '081212452672',
            'profile_picture' => '/images/user/profile2.jpg',
            'email' => 'test.admin@email.com',
            'password' => Hash::make('password'),
            'address' => 'Jalan Semangka No. 3',
            'gender' => 'M'
         ]
      ]);
   }
}
