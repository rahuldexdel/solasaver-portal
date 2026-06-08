<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Check if user already exists to prevent duplicates
        $admin = User::firstOrCreate(
            ['email' => 'admin@solasaver.com'],
            [
                'name' => 'System Admin',
                'password' => Hash::make('password')
            ]
        );

        // Assign role configuration
        $admin->assignRole('admin');
    }
}