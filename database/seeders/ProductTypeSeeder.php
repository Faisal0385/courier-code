<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $productTypes = [
            [
                'id' => 1,
                'name' => 'Document',
                'slug' => 'document',
                'status' => 1,
                'created_at' => '2025-11-16 04:06:29',
                'updated_at' => '2025-11-25 02:38:15',
            ],
            [
                'id' => 2,
                'name' => 'Parcel',
                'slug' => 'parcel',
                'status' => 1,
                'created_at' => '2025-11-25 02:38:27',
                'updated_at' => '2025-11-25 02:38:27',
            ],
        ];

        foreach ($productTypes as $type) {
            ProductType::updateOrCreate(
                ['id' => $type['id']],
                $type
            );
        }
    }
}
