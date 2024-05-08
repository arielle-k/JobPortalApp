<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>User::Factory(),
            'address'=>fake()->address(),
            'gender'=>fake()->randomElement(['male','female']),
            'dob'=>fake()->date($format = 'd-m-Y', $max = 'now'),
            'experience'=>fake()->randomDigit(),
            'bio'=>fake()->sentence(),
            'cover_letter'=>fake()->word(),
            'resume'=>fake()->word(),
            'avatar'=>fake()->word()
        ];
    }
}
