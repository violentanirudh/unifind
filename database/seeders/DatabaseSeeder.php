<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Item;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $creators = ['Anirudh', 'Dev', 'Maitri', 'Avani'];

        foreach ($creators as $name) {
            User::create([
                'name' => $name,
                'email' => strtolower($name) . '@unifind.com',
                'password' => Hash::make('password'),
            ]);
        }
        // Ensure the storage directory for images exists
        Storage::disk('public')->makeDirectory('images');

        // Create some users
        User::factory(5)->create();

        $users = User::all();

        $items = [
            ['name' => 'Black Wallet', 'description' => 'Leather wallet with multiple card slots, possibly containing student ID.'],
            ['name' => 'iPhone 12', 'description' => 'Blue iPhone with a cracked screen protector.'],
            ['name' => 'Water Bottle', 'description' => 'Steel water bottle with a red sticker.'],
            ['name' => 'Laptop Charger', 'description' => '65W Dell charger, black with tape on the cable.'],
            ['name' => 'Notebook', 'description' => 'Spiral-bound notebook with physics notes.'],
            ['name' => 'Headphones', 'description' => 'Black over-ear Sony headphones.'],
            ['name' => 'USB Drive', 'description' => '16GB Sandisk pendrive with keychain attached.'],
            ['name' => 'Backpack', 'description' => 'Blue Wildcraft backpack with front pocket torn slightly.'],
            ['name' => 'Calculator', 'description' => 'Casio fx-991EX scientific calculator.'],
            ['name' => 'Wrist Watch', 'description' => 'Silver analog Fastrack watch with leather strap.'],
            ['name' => 'House Keys', 'description' => 'Keychain with 3 silver keys and a football keyring.'],
            ['name' => 'ID Card', 'description' => 'Student ID card in a transparent holder.'],
            ['name' => 'Sweatshirt', 'description' => 'Grey hoodie with Nike logo, size M.'],
            ['name' => 'Earbuds', 'description' => 'White Apple AirPods in charging case.'],
            ['name' => 'Spectacles', 'description' => 'Black rectangular frame glasses.'],
            ['name' => 'Cycle Helmet', 'description' => 'Black helmet with blue stripes.'],
            ['name' => 'Power Bank', 'description' => 'Xiaomi 10,000mAh black power bank.'],
            ['name' => 'Math Textbook', 'description' => 'Advanced Calculus textbook, 3rd edition.'],
            ['name' => 'Lab Coat', 'description' => 'White lab coat with pen stains on the pocket.'],
            ['name' => 'USB Cable', 'description' => 'Black Type-C charging cable, slightly frayed.'],
        ];

        foreach ($items as $item) {
            $randomUser = $users->random();
            $imagePath = null; // Default to null

            // --- Logic to download and store image ---
            try {
                $imageUrl = 'https://picsum.photos/seed/'. fake()->unique()->numberBetween(1, 1000) .'/400/400';
                $imageContents = Http::get($imageUrl)->body();

                if ($imageContents) {
                    $imageName = 'images/' . Str::random(40) . '.jpg';
                    Storage::disk('public')->put($imageName, $imageContents);
                    $imagePath = $imageName;
                }
            } catch (\Exception $e) {
                // If the image download fails, we'll just proceed without an image.
                // You could log the error here if needed: Log::error($e->getMessage());
            }
            // --- End of image logic ---

            Item::create([
                'name'        => $item['name'],
                'description' => $item['description'],
                'location'    => fake()->city(),
                'image_path'  => $imagePath, // Use the local path here
                'code'        => strtoupper(fake()->bothify('?##??#')),
                'points'      => fake()->numberBetween(10, 100),
                'status'      => fake()->randomElement(['lost', 'found']),
                'is_visible'  => fake()->boolean(80),
                'reported_by' => $randomUser->id,
                'created_at'  => fake()->dateTimeBetween('-3 days', 'now'),
            ]);
        }
    }
}
