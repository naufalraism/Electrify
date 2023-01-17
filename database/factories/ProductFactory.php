<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $productImages = [
        //     'images/product1.png',
        //     'images/product2.png',
        //     'images/product3.png',
        //     'images/product4.png'
        // ];

        // return [
        //     'name' => $this->faker->name(),
        //     'category_id' => random_int(1,3),
        //     'price' => random_int(2000000, 5000000),
        //     'description' => $this->faker->paragraph(),
        //     'stock' => random_int(1,50),
        //     'sold' => random_int(1,50),
        //     'image' => $productImages[random_int(0,3)]
        // ];
    }
}
