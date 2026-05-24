<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);
        
        // Create Demo Users with Profiles
        $users = [
            [
                'name' => 'Priya Sharma',
                'email' => 'priya@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'profile' => [
                    'gender' => 'female',
                    'looking_for' => 'groom',
                    'age' => 26,
                    'religion' => 'Hindu',
                    'city' => 'Mumbai',
                    'education' => 'MBA',
                    'occupation' => 'Marketing Manager',
                    'annual_income' => '10-15 Lakhs',
                    'about_me' => 'I am a fun-loving, caring person looking for my soulmate',
                    'marital_status' => 'Never Married',
                    'height' => "5'4''",
                    'mother_tongue' => 'Hindi'
                ]
            ],
            [
                'name' => 'Rajesh Kumar',
                'email' => 'rajesh@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'profile' => [
                    'gender' => 'male',
                    'looking_for' => 'bride',
                    'age' => 29,
                    'religion' => 'Hindu',
                    'city' => 'Delhi',
                    'education' => 'B.Tech',
                    'occupation' => 'Software Engineer',
                    'annual_income' => '15+ Lakhs',
                    'about_me' => 'Simple, honest, and family-oriented person',
                    'marital_status' => 'Never Married',
                    'height' => "5'10''",
                    'mother_tongue' => 'Hindi'
                ]
            ],
            [
                'name' => 'Neha Patel',
                'email' => 'neha@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'profile' => [
                    'gender' => 'female',
                    'looking_for' => 'groom',
                    'age' => 25,
                    'religion' => 'Hindu',
                    'city' => 'Ahmedabad',
                    'education' => 'CA',
                    'occupation' => 'Chartered Accountant',
                    'annual_income' => '10-15 Lakhs',
                    'about_me' => 'Ambitious, independent, and family values',
                    'marital_status' => 'Never Married',
                    'height' => "5'3''",
                    'mother_tongue' => 'Gujarati'
                ]
            ],
            [
                'name' => 'Amit Singh',
                'email' => 'amit@example.com',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'profile' => [
                    'gender' => 'male',
                    'looking_for' => 'bride',
                    'age' => 31,
                    'religion' => 'Hindu',
                    'city' => 'Bangalore',
                    'education' => 'M.Tech',
                    'occupation' => 'Product Manager',
                    'annual_income' => '15+ Lakhs',
                    'about_me' => 'Tech enthusiast, love traveling and photography',
                    'marital_status' => 'Never Married',
                    'height' => "5'11''",
                    'mother_tongue' => 'Hindi'
                ]
            ],
        ];
        
        foreach ($users as $userData) {
            $profileData = $userData['profile'];
            unset($userData['profile']);
            
            $user = User::create($userData);
            UserProfile::create(array_merge($profileData, ['user_id' => $user->id]));
        }
    }
}