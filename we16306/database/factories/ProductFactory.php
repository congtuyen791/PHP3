<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'price'=>$this->faker->randomNumber(),
            'thumbnail_url' => 'https://placeimg.com/100/100/any?' . rand(1, 100),
            'status'=>rand(0, 1),
        ];
    }
}
