<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 🧍‍♂️ Admin user
        User::create([
            'name' => 'Packer Panda',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('11111111'),
            'phone' => '01700000000',
            'address' => 'Dhaka, Bangladesh',
            'role' => 'Admin',
            'status' => 1,
        ]);
    }
}
