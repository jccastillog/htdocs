<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(5),
            'coordenadas' => [
                'lat' => $this->faker->latitude(),
                'lng' => $this->faker->longitude(),
            ],
            'images' => [],
            'status' => $this->faker->randomElement(['1', '0']),
            'provider_id' => $this->faker->numberBetween(1, 10),
            'service_type_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
