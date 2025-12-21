<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['id' => 9, 'name' => 'booking.menu', 'group_name' => 'booking', 'guard_name' => 'web'],
            ['id' => 10, 'name' => 'booking.operator.create', 'group_name' => 'booking', 'guard_name' => 'web'],
            ['id' => 11, 'name' => 'order.create', 'group_name' => 'booking', 'guard_name' => 'web'],

            ['id' => 12, 'name' => 'store.menu', 'group_name' => 'store', 'guard_name' => 'web'],
            ['id' => 13, 'name' => 'store.create', 'group_name' => 'store', 'guard_name' => 'web'],
            ['id' => 14, 'name' => 'store.admin.create', 'group_name' => 'store', 'guard_name' => 'web'],

            ['id' => 15, 'name' => 'hub.menu', 'group_name' => 'hub', 'guard_name' => 'web'],
            ['id' => 16, 'name' => 'hub.create', 'group_name' => 'hub', 'guard_name' => 'web'],
            ['id' => 17, 'name' => 'hub.incharge.create', 'group_name' => 'hub', 'guard_name' => 'web'],
            ['id' => 18, 'name' => 'store.incharge.create', 'group_name' => 'hub', 'guard_name' => 'web'],
            ['id' => 19, 'name' => 'dispatch.incharge.create', 'group_name' => 'hub', 'guard_name' => 'web'],

            ['id' => 20, 'name' => 'setting.menu', 'group_name' => 'setting', 'guard_name' => 'web'],
            ['id' => 24, 'name' => 'admin.create', 'group_name' => 'setting', 'guard_name' => 'web'],

            ['id' => 21, 'name' => 'role.menu', 'group_name' => 'role', 'guard_name' => 'web'],
            ['id' => 22, 'name' => 'product.menu', 'group_name' => 'product', 'guard_name' => 'web'],
            ['id' => 23, 'name' => 'merchant.manage', 'group_name' => 'merchant', 'guard_name' => 'web'],
        ];

        foreach ($permissions as $perm) {
            Permission::updateOrCreate(
                ['id' => $perm['id']],
                [
                    'name' => $perm['name'],
                    'group_name' => $perm['group_name'],
                    'guard_name' => $perm['guard_name'],
                ]
            );
        }
    }
}
