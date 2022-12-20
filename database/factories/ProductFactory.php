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
        $productImages = [
            'images/product1.png',
            'images/product2.png',
            'images/product3.png',
            'images/product4.png'
        ];

        return [
            'name' => $this->faker->name(),
            'category_id' => random_int(1,5),
            'price' => $this->faker->randomDigit(),
            'description' => $this->faker->paragraph(),
            'stock' => random_int(1,50),
            'sold' => random_int(1,50),
            'image' => $productImages[random_int(0,3)]
        ];
    }
}
