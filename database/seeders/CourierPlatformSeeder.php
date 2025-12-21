<?php

namespace Database\Seeders;

use App\Models\CourierPlatform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CourierPlatformSeeder extends Seeder
{
    // php artisan db:seed --class=CourierPlatformSeeder
    private array $data;

    public function __construct()
    {
        $this->data = array(
            [
                'name' => CourierPlatform::COURIER_PLATFORM_PATHAO,
                'value' => CourierPlatform::COURIER_PLATFORM_PATHAO_VALUE,
                'logo' => 'assets/img/logo/pathao.svg',
            ],
            [
                'name' => CourierPlatform::COURIER_PLATFORM_STEADFAST,
                'value' => CourierPlatform::COURIER_PLATFORM_STEADFAST_VALUE,
                'logo' => 'assets/img/logo/steadfast.svg',
            ],
        );
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->alert("Seeding Courier Platform Type");
        collect($this->data)->each(function ($item) {
            $DB_CourierPlatform = CourierPlatform::updateOrCreate([
                'value' => Arr::get($item, 'value'),
            ], [
                'name' => Arr::get($item, 'name'),
                'logo' => Arr::get($item, 'logo'),
            ]);

            $this->command->info('Courier Platform Type seeded[' . $DB_CourierPlatform->id . ']: ' . $DB_CourierPlatform->name);
        });
    }
}
