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
    public function definition():array
    {
        return [
            'image'=>'images/p'.rand(1,8).'.png',
            'name' => fake()->regexify('[A-Z]{5}[0-4]{3}'),
            'description' => fake()->asciify('user-****'),
            'price' => fake()->numberBetween(0, 999999999),
            'produced_on' => now(),
            'clothes_id'=>rand(1,4),
            'description' => fake()->numerify('user-####'),
        ];
        
    }
}
