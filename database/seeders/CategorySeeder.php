<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define categories structure
        $categories = [
            'Vehicles' => [
                'Cars',
                'Motorcycles & Scooters',
                'Trucks & Commercial',
                'Car Parts & Accessories',
                'Boats & Marine',
                'Bicycles',
            ],
            'Real Estate' => [
                'Houses for Sale',
                'Houses for Rent',
                'Apartments for Sale',
                'Apartments for Rent',
                'Commercial Property',
                'Land & Plots',
                'Roommates',
            ],
            'Electronics' => [
                'Mobile Phones',
                'Computers & Laptops',
                'Cameras',
                'Audio & Sound',
                'TV & Video',
                'Gaming',
                'Electronics Parts',
            ],
            'Jobs' => [
                'Full Time Jobs',
                'Part Time Jobs',
                'Freelance',
                'Internships',
                'Remote Work',
                'Government Jobs',
                'Teaching Jobs',
            ],
            'Business & Industrial' => [
                'Business for Sale',
                'Office Equipment',
                'Industrial Equipment',
                'Restaurant Equipment',
                'Medical Equipment',
                'Construction',
                'Agriculture',
            ],
        ];

        // Create categories and subcategories
        foreach ($categories as $parentName => $subcategories) {
            // Create parent category
            $parentCategory = Category::create([
                'name' => $parentName,
                'parent_id' => null,
            ]);

            // Create subcategories
            foreach ($subcategories as $subcategoryName) {
                Category::create([
                    'name' => $subcategoryName,
                    'parent_id' => $parentCategory->id,
                ]);
            }
        }

        $this->command->info('Categories seeded successfully!');
        $this->command->info('Total parent categories: '.count($categories));
        $this->command->info('Total subcategories: '.array_sum(array_map('count', $categories)));
        $this->command->info('Total categories: '.Category::count());
    }
}
