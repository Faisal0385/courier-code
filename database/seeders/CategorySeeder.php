<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Technology',
                'image' => 'sample-images/categories/category_1.jpg',
                'thumb_image' => 'sample-images/categories/category_1.jpg',
                'status' => true,
            ],
            [
                'name' => 'Health & Wellness',
                'image' => 'sample-images/categories/category_2.jpg',
                'thumb_image' => 'sample-images/categories/category_2.jpg',
                'status' => true,
            ],
            [
                'name' => 'Education',
                'image' => 'sample-images/categories/category_3.jpg',
                'thumb_image' => 'sample-images/categories/category_3.jpg',
                'status' => true,
            ],
            [
                'name' => 'Business',
                'image' => 'sample-images/categories/category_4.jpg',
                'thumb_image' => 'sample-images/categories/category_4.jpg',
                'status' => false,
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'image' => $category['image'],
                'thumb_image' => $category['thumb_image'],
                'status' => $category['status'],
            ]);
        }
    }
}
