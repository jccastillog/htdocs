<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provider>
 */
class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_legal_id' => $this->faker->randomElement(['CC', 'CE', 'NIT']),
            'legal_id' => $this->faker->unique()->randomNumber(8),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'social_media' => [
                'facebook' => [
                    'enabled' => $this->faker->randomElement(['1', '0']),
                    'account' => 'https://facebook.com/' . $this->faker->userName(),
                ],
                'instagram' => [
                    'enabled' => $this->faker->randomElement(['1', '0']),
                    'account' => 'https://instagram.com/' . $this->faker->userName(),
                ],
                'twitter' => [
                    'enabled' => $this->faker->randomElement(['1', '0']),
                    'account' => 'https://twitter.com/' . $this->faker->userName(),
                ],
            ],
            'status' => $this->faker->randomElement(['1', '0']),
            'score' => $this->faker->randomFloat(1, 0, 5),
        ];
    }
}
