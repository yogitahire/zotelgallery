<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /*
    *
    * Run the database seeds
    */
    public function run(): void
    {
        $nature = Category::where('name', 'Nature')->first();
        $architecture = Category::where('name', 'Architecture')->first();
        $animals = Category::where('name', 'Animals')->first();
        $technology = Category::where('name', 'Technology')->first();

        if ($nature) {
            Image::truncate();
            Image::create([
                'title' => 'Beautiful Forest',
                'description' => 'A serene view of a lush forest.',
                'imagetag' => 'forest, nature, trees',
                'imagepath' => 'imagegallery/nature/forest.jpg',
                'category_id' => $nature->id,
            ]);

            Image::create([
                'title' => 'Mountain Range',
                'description' => 'Majestic mountains under a clear sky.',
                'imagetag' => 'mountains, nature, landscape',
                'imagepath' => 'imagegallery/nature/mountains.jpg',
                'category_id' => $nature->id,
            ]);
        }

        if ($architecture) {
            Image::create([
                'title' => 'Modern Skyscraper',
                'description' => 'A towering skyscraper with glass windows.',
                'imagetag' => 'skyscraper, architecture, modern',
                'imagepath' => 'imagegallery/architecture/skyscraper.jpg',
                'category_id' => $architecture->id,
            ]);

            Image::create([
                'title' => 'Ancient Temple',
                'description' => 'A beautifully preserved ancient temple.',
                'imagetag' => 'temple, architecture, ancient',
                'imagepath' => 'imagegallery/architecture/temple.jpg',
                'category_id' => $architecture->id,
            ]);
        }

        if ($animals) {
            Image::create([
                'title' => 'African Elephant',
                'description' => 'A majestic African elephant in the wild.',
                'imagetag' => 'elephant, wildlife, animals',
                'imagepath' => 'imagegallery/animals/elephant.jpg',
                'category_id' => $animals->id,
            ]);

            Image::create([
                'title' => 'Colorful Parrot',
                'description' => 'A vibrant parrot sitting on a branch.',
                'imagetag' => 'parrot, birds, animals',
                'imagepath' => 'imagegallery/animals/parrot.jpg',
                'category_id' => $animals->id,
            ]);
        }

        if ($technology) {
            Image::create([
                'title' => 'Futuristic Robot',
                'description' => 'A state-of-the-art futuristic robot.',
                'imagetag' => 'robot, technology, future',
                'imagepath' => 'imagegallery/technology/robot.jpg',
                'category_id' => $technology->id,
            ]);

            Image::create([
                'title' => 'Virtual Reality',
                'description' => 'A person experiencing virtual reality.',
                'imagetag' => 'vr, technology, innovation',
                'imagepath' => 'imagegallery/technology/vr.jpg',
                'category_id' => $technology->id,
            ]);
        }
    }

}
