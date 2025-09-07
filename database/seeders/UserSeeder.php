<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@freeads.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'phone_number' => '+22969706697',
            'profile_image' => 'images/ads_image/no-pic.jpeg',
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'phone_number' => '+2290169706698',
            'profile_image' => 'images/ads_image/no-pic.jpeg',
        ]);

        User::create([
            'name' => 'Chistopher Wallace',
            'email' => 'wallace@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'phone_number' => '+2290169706658',
            'profile_image' => 'images/ads_image/no-pic.jpeg',
        ]);

        User::create([
            'name' => 'Walter White',
            'email' => 'walter@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'phone_number' => '+2290169706690',
            'profile_image' => 'images/ads_image/no-pic.jpeg',
        ]);

        $this->command->info('Users seeded successfully!');
        $this->command->info('Total users created: '.User::count());
        $this->command->info('Test login: admin@freeads.com / password');
    }
}
