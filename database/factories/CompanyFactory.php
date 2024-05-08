<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
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
        'cname'=>fake()->company,
        'slug'=>fake()->sentence(),
        'address'=>fake()->address,
        'phone'=>fake()->phoneNumber,
        'website'=>fake()->domainName,
        'logo'=>'man.jpg',
        'cover_photo'=>'cover.jpg',
        'slogan'=>'lear-earn and grow',
        'description'=>fake()->paragraph(rand(2,10))
        ];
    }
}
