<?php

namespace Database\Seeders;

use App\Models\Ad;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all users and categories
        $users = User::all();
        $categories = Category::whereNotNull('parent_id')->get(); // Only subcategories

        // Sample ads data categorized by type
        $adsData = [
            // Vehicle ads
            'Vehicles' => [
                ['title' => '2020 Toyota Camry - Excellent Condition', 'price' => 18500.00, 'location' => 'New York, NY', 'description' => 'Low mileage, well maintained Toyota Camry. Perfect for daily commuting. Clean title, no accidents.', 'ads_image' => 'images/ads_image/toyota.jpeg'],
                ['title' => '2018 Honda Civic - Great Gas Mileage', 'price' => 15200.00, 'location' => 'Los Angeles, CA', 'description' => 'Reliable Honda Civic with excellent fuel economy. Recent maintenance records available.', 'ads_image' => 'images/ads_image/honda.jpeg'],
                ['title' => 'Yamaha R6 Motorcycle - Sport Bike', 'price' => 8500.00, 'location' => 'Miami, FL', 'description' => 'Well-maintained sport motorcycle. Perfect for weekend rides. Adult owned, garage kept.', 'ads_image' => 'images/ads_image/yamaha.jpeg'],
                ['title' => 'Ford F-150 Pickup Truck 2019', 'price' => 28900.00, 'location' => 'Dallas, TX', 'description' => 'Heavy-duty pickup truck with towing package. Great for work or recreation.', 'ads_image' => 'images/ads_image/ford.jpeg'],
            ],

            // Real Estate ads
            'Real Estate' => [
                ['title' => '3BR/2BA House for Rent - Downtown', 'price' => 2200.00, 'location' => 'Austin, TX', 'description' => 'Beautiful house in prime location. Modern amenities, parking included, pet-friendly.', 'ads_image' => 'images/ads_image/3br.jpeg'],
                ['title' => 'Luxury Apartment - City View', 'price' => 3500.00, 'location' => 'San Francisco, CA', 'description' => 'High-rise apartment with stunning city views. Gym, pool, concierge services included.', 'ads_image' => 'images/ads_image/luxury.jpeg'],
                ['title' => 'Commercial Office Space', 'price' => 4500.00, 'location' => 'Chicago, IL', 'description' => 'Prime commercial space in business district. High foot traffic, parking available.', 'ads_image' => 'images/ads_image/office.jpeg'],
                ['title' => 'Land for Sale - 5 Acres', 'price' => 85000.00, 'location' => 'Denver, CO', 'description' => 'Beautiful vacant land perfect for building your dream home. Mountain views, utilities nearby.'],
            ],

            // Electronics ads
            'Electronics' => [
                ['title' => 'iPhone 14 Pro Max - Unlocked', 'price' => 899.00, 'location' => 'Seattle, WA', 'description' => 'Like new iPhone 14 Pro Max. Unlocked, comes with original box and charger.'],
                ['title' => 'MacBook Pro M2 - Perfect for Work', 'price' => 1299.00, 'location' => 'Boston, MA', 'description' => 'Powerful MacBook Pro with M2 chip. Ideal for professionals and students.'],
                ['title' => 'Gaming PC - High Performance', 'price' => 1850.00, 'location' => 'Phoenix, AZ', 'description' => 'Custom built gaming PC with RTX 4070, perfect for 4K gaming and streaming.'],
                ['title' => 'Canon DSLR Camera Kit', 'price' => 650.00, 'location' => 'Portland, OR', 'description' => 'Professional camera kit with multiple lenses. Great for photography enthusiasts.'],
            ],

            // Furniture ads
            'Furniture & Home' => [
                ['title' => 'Modern Sectional Sofa - Like New', 'price' => 899.00, 'location' => 'Atlanta, GA', 'description' => 'Comfortable sectional sofa in excellent condition. Non-smoking home, pet-free.'],
                ['title' => 'Dining Table Set - Seats 6', 'price' => 450.00, 'location' => 'Nashville, TN', 'description' => 'Beautiful wooden dining set with 6 chairs. Perfect for family meals and entertaining.'],
                ['title' => 'King Size Bedroom Set', 'price' => 750.00, 'location' => 'Las Vegas, NV', 'description' => 'Complete bedroom set including bed frame, dresser, and nightstands.'],
                ['title' => 'Home Theater System', 'price' => 1200.00, 'location' => 'Orlando, FL', 'description' => 'Professional home theater setup with surround sound. Perfect for movie nights.'],
            ],

            // Job listings
            'Jobs' => [
                ['title' => 'Software Developer - Remote', 'price' => 75000.00, 'location' => 'Remote', 'description' => 'Full-time software developer position. Work from home, competitive salary, great benefits.'],
                ['title' => 'Marketing Manager - Full Time', 'price' => 65000.00, 'location' => 'Detroit, MI', 'description' => 'Lead marketing initiatives for growing company. Experience in digital marketing required.'],
                ['title' => 'Part Time Tutor - Math & Science', 'price' => 25.00, 'location' => 'Sacramento, CA', 'description' => 'Help students with math and science. Flexible hours, rewarding work.'],
                ['title' => 'Freelance Graphic Designer', 'price' => 35.00, 'location' => 'Remote', 'description' => 'Creative designer needed for various projects. Portfolio required.'],
            ],
        ];

        $totalAds = 0;

        // Create ads for each category
        foreach ($adsData as $categoryType => $ads) {
            foreach ($ads as $adData) {
                // Find a random subcategory from the appropriate parent category
                $parentCategory = Category::where('name', 'LIKE', '%'.explode(' ', $categoryType)[0].'%')
                    ->whereNull('parent_id')
                    ->first();

                if ($parentCategory) {
                    $subcategory = Category::where('parent_id', $parentCategory->id)
                        ->inRandomOrder()
                        ->first();
                } else {
                    // Fallback to any subcategory
                    $subcategory = $categories->random();
                }

                Ad::create([
                    'title' => $adData['title'],
                    'ads_price' => $adData['price'],
                    'ads_image' => $adData['ads_image'] ?? null, // You can add image URLs here later
                    'location' => $adData['location'],
                    'ads_description' => $adData['description'],
                    'category_id' => $subcategory->id,
                    'user_id' => $users->random()->id,
                    'created_at' => now()->subDays(rand(0, 30)), // Random creation dates
                    'updated_at' => now()->subDays(rand(0, 30)),
                ]);

                $totalAds++;
            }
        }

        $this->command->info('Ads seeded successfully!');
        $this->command->info('Total ads created: '.$totalAds);
    }
}
