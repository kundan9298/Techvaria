<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HR;
use App\Models\Candidate;
use App\Models\Interview;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        HR::factory(10)->create();
        Candidate::factory(90)->create();
        Interview::factory(50)->create();

        Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'dob' => '09/02/1998',
            'phone' => '8252359422',
            'password' =>Hash::make('admin'),
        ]);


        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
