<?php

namespace Database\Factories;

use App\Models\Clothes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clothes>
 */
class ClothesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
  

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $mang = ['QUẦN', 'ÁO', 'GIÀY', 'TÚI SÁCH'];
        return [
            'type' => $this->faker->unique()->randomElement($mang)
        ];
    }
}
