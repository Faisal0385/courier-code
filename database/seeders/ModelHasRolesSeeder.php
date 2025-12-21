<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelHasRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Key = user_id, Value = role_id
        $assignments = [
            10 => 3,
            11 => 3,
            12 => 3,
            18 => 3,
            19 => 3,

            13 => 5,

            14 => 9,
            22 => 9,
            23 => 9,

            15 => 10,
            16 => 10,
            17 => 10,
            20 => 10,
            21 => 10,

            3  => 11,
            4  => 11,
        ];

        foreach ($assignments as $userId => $roleId) {
            $user = User::find($userId);
            if ($user) {
                $user->assignRole($roleId);
            }
        }
    }
}
