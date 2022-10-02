<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Post::factory(10)->create();

        \App\Models\Post::factory()->create([
            'text' => 'Test User',
            'user_id' => 11,
        ]);
    }
}