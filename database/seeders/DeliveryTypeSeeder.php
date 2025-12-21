<?php

namespace Database\Seeders;

use App\Models\DeliveryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deliveryTypes = [
            [
                'id' => 12,
                'name' => 'Demand Delivery',
                'slug' => 'demand-delivery',
                'status' => 1,
                'created_at' => '2025-11-25 02:39:13',
                'updated_at' => '2025-11-25 02:39:13',
            ],
            [
                'id' => 48,
                'name' => 'Normal Delivery',
                'slug' => 'normal-delivery',
                'status' => 1,
                'created_at' => '2025-11-16 04:07:54',
                'updated_at' => '2025-11-16 04:07:54',
            ],
        ];

        foreach ($deliveryTypes as $type) {
            DeliveryType::updateOrCreate(
                ['id' => $type['id']],
                $type
            );
        }
    }
}
