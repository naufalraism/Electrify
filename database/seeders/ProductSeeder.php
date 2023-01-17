<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::query()->insert(
            [
                [
                    "id" => 1,
                    "name" => "Asus Zenbook Laptop",
                    "category_id" => 1,
                    "description" => "This is Asus Zenbook Laptop",
                    "stock" => 12,
                    "sold" => 122,
                    "image" => 'images/asus-zenbook-laptop.jpg',
                    "price" => 14000000
                ],
                [
                    "id" => 2,
                    "name" => "Samsung Galaxy Book2 Pro 360",
                    "category_id" => 1,
                    "description" => "This is Samsung Galaxy Book2 Pro 360",
                    "stock" => 120,
                    "sold" => 60,
                    "image" => 'images/Samsung-Galaxy-Book2-Pro-360.jpg',
                    "price" => 23000000
                ],
                [
                    "id" => 3,
                    "name" => "Samsung Galaxy Tab S6 Lite",
                    "category_id" => 2,
                    "description" => "This is Samsung Galaxy Tab S6 Lite",
                    "stock" => 15,
                    "sold" => 12,
                    "image" => 'images/Samsung-Galaxy-Tab-S6-Lite.jpg',
                    "price" => 18000000
                ],
                [
                    "id" => 4,
                    "name" => "Logitech MX Master",
                    "category_id" => 3,
                    "description" => "This is Logitech MX Master",
                    "stock" => 512,
                    "sold" => 200,
                    "image" =>'images/Logitech_MX_Master_3.png',
                    "price" => 160000
                ],
                [
                    "id" => 5,
                    "name" => "MacBook Pro 14",
                    "category_id" => 1,
                    "description" => "This is MacBook Pro 14",
                    "stock" => 120,
                    "sold" => 60,
                    "image" =>'images/MacBook-Pro-14-Laptop.jpg',
                    "price" => 15000000
                ],
                [
                    "id" => 6,
                    "name" => "Huawei MatePad Pro",
                    "category_id" => 2,
                    "description" => "This is Huawei MatePad Pro",
                    "stock" => 120,
                    "sold" => 60,
                    "image" =>'images/Huawei-MatePad-Pro.jpg',
                    "price" => 12000000
                ],
            ]
        );
    }
}
