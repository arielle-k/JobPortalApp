<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
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
        'company_id'=>Company::Factory(),
        'title'=>fake()->jobTitle(),
        'slug'=>fake()->sentence(6,true),
        'position'=>fake()->jobTitle,
        'address'=>fake()->address,
        'category_id'=>Category::factory(),
        'type'=>'fulltime',
        'status'=>rand(0,1),
        'description'=>fake()->paragraph(rand(2,10)),
        'roles'=>fake()->text,
        'salary'=>rand(10000,50000),
        'last_date'=>fake()->date('Y-m-d')

        ];
    }
}
