<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['id' => 3,  'name' => 'Admin', 'guard_name' => 'web'],
            ['id' => 5,  'name' => 'Merchant', 'guard_name' => 'web'],
            ['id' => 6,  'name' => 'Hub Incharge', 'guard_name' => 'web'],
            ['id' => 7,  'name' => 'Store Incharge', 'guard_name' => 'web'],
            ['id' => 8,  'name' => 'Dispatch Incharge', 'guard_name' => 'web'],
            ['id' => 9,  'name' => 'Store Admin', 'guard_name' => 'web'],
            ['id' => 10, 'name' => 'Booking Operator', 'guard_name' => 'web'],
            ['id' => 11, 'name' => 'Merchant Fullfillment', 'guard_name' => 'web'],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['id' => $role['id']],
                [
                    'name' => $role['name'],
                    'guard_name' => $role['guard_name'],
                ]
            );
        }
    }
}
