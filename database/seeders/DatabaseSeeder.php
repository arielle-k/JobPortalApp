<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Job;
use App\Models\User;
use App\Models\Company;
use App\Models\Category;
use App\Models\Profile;
use App\Models\Post;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Category::factory(8)->create();
        User::factory(10)->create();
        Company::factory(10)->create();
        Job::factory(20)->create();
        Profile::factory(10)->create();
        //Post::factory(10)->create();

    }
}
