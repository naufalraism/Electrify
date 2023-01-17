<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::query()->insert(
            [
                [
                    "id" => 1,
                    "name" => "Laptop"

                ],
                [
                    "id" => 2,
                    "name" => "Tablet"
                ],
                [
                    "id" => 3,
                    "name" => "Mouse"
                ]
            ]
        );
    }
}
