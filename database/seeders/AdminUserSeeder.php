<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'figuraarpad03@gmail.com'], // Unique identifier
            [
                'name' => 'Figura Árpád',
                'email' => 'figuraarpad03@gmail.com',
                'password' => Hash::make('admin123456'), // Securely hash the password
            ]
        );
    }
}
