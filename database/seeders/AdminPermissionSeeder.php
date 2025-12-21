<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::find(1); // Admin user ID

        if ($admin) {
            // Assign all existing permissions to Admin
            $permissions = Permission::all()->pluck('name')->toArray();
            $admin->givePermissionTo($permissions);
        }
    }
}
