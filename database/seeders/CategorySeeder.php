<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Nature',
            'description' => 'Explore the beauty of nature with stunning landscapes, flora, and fauna from around the world.',
        ]);

        Category::create([
            'name' => 'Architecture',
            'description' => 'Discover architectural marvels and innovative designs that shape the built environment.',
        ]);

        Category::create([
            'name' => 'Animals',
            'description' => 'Dive into the world of animals, showcasing wildlife, pets, and their habitats.',
        ]);

        Category::create([
            'name' => 'Technology',
            'description' => 'Stay updated with the latest in technology, featuring gadgets, innovations, and industry trends.',
        ]);
        if (!Category::where('name', 'Uncategorized')->exists()) {
            Category::create([
                'name' => 'Uncategorized',
                'description' => 'Default category for uncategorized images.',
            ]);
        }
    }
}
