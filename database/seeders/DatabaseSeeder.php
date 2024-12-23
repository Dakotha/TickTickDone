<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Robert Bednarowicz',
            'email' => 'robb.bednarowicz@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('nhatrang'),
            'remember_token' => Str::random(10),
        ]);

        Task::factory(100)->create();
    }
}
