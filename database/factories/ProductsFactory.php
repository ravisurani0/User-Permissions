<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    protected $model = Products::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(5, true),
            'detail' => $this->faker->paragraph(5, true),
            'quantity' =>  $this->faker->biasedNumberBetween(100, 200),
            'price' =>  $this->faker->biasedNumberBetween(500, 1000),

        ];
    }
}
