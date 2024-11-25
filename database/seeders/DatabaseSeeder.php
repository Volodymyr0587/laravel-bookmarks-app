<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Bookmark;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a specific user with known credentials
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => 'password123',
            'remember_token' => Str::random(10),
        ]);

        Bookmark::factory(100)->create(['user_id' => $user->id]);
    }
}
