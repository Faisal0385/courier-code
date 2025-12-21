<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shop::create([
            'name' => 'Digital Coffee Mart',
            'email' => 'mart@digitalcoffee.com',
            'phone' => '01710000000',
            'address' => 'Dhaka, Bangladesh',
            'logo' => null,
            'status' => 'active',
        ]);

        Shop::create([
            'name' => 'Green Valley Store',
            'email' => 'greenvalley@example.com',
            'phone' => '01820000000',
            'address' => 'Chittagong, Bangladesh',
            'logo' => null,
            'status' => 'active',
        ]);

        Shop::create([
            'name' => 'Tech World Electronics',
            'email' => 'support@techworld.com',
            'phone' => '01930000000',
            'address' => 'Sylhet, Bangladesh',
            'logo' => null,
            'status' => 'inactive',
        ]);
    }
}
