<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Item;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create some users
        User::factory(3)->create();

        $users = User::all();

        // foreach (range(1, rand(20, 50)) as $index) {
        //     $randomUser = $users->random();

        //     Item::factory()->create([
        //         'reported_by' => $randomUser->id,
        //     ]);
        // }


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
            ['name' => 'Sports Shoes', 'description' => 'White Adidas sneakers with blue stripes.'],
            ['name' => 'Jacket', 'description' => 'Black puffer jacket, size L.'],
            ['name' => 'Laptop', 'description' => 'Silver MacBook Air with stickers on the back.'],
            ['name' => 'Pen Drive', 'description' => '32GB Kingston USB drive with red cap.'],
            ['name' => 'Earphones', 'description' => 'Wired earphones, black with mic.'],
            ['name' => 'Cap', 'description' => 'Blue baseball cap with college logo.'],
            ['name' => 'Tablet', 'description' => 'Samsung Galaxy Tab S6, black case.'],
            ['name' => 'Textbook', 'description' => 'Physics Fundamentals, red cover, 2nd edition.'],
            ['name' => 'Lunch Box', 'description' => 'Green plastic lunchbox with cartoon print.'],
            ['name' => 'Umbrella', 'description' => 'Foldable black umbrella with metal handle.'],
            ['name' => 'Sports Bottle', 'description' => 'Plastic bottle with motivational quotes printed.'],
            ['name' => 'Bluetooth Speaker', 'description' => 'Small JBL speaker, blue color.'],
            ['name' => 'Diary', 'description' => 'Brown leather diary with pen holder.'],
            ['name' => 'Scarf', 'description' => 'Woolen scarf, red and black stripes.'],
            ['name' => 'Gloves', 'description' => 'Pair of black winter gloves.'],
            ['name' => 'Pencil Box', 'description' => 'Blue pencil case with zipper.'],
            ['name' => 'Marker Pen Set', 'description' => 'Set of 4 whiteboard markers.'],
            ['name' => 'Head Cap', 'description' => 'Grey beanie cap.'],
            ['name' => 'Passport', 'description' => 'Passport in a brown leather cover.'],
            ['name' => 'Driving License', 'description' => 'Plastic card license in a transparent cover.'],
            ['name' => 'Debit Card', 'description' => 'HDFC bank debit card, blue color.'],
            ['name' => 'Notebook', 'description' => 'Green spiral notebook with math notes.'],
            ['name' => 'Keychain', 'description' => 'Car key with remote lock button.'],
            ['name' => 'Watch', 'description' => 'Smartwatch, black strap, cracked screen.'],
            ['name' => 'Flash Drive', 'description' => '64GB Sandisk flash drive.'],
            ['name' => 'Folder', 'description' => 'Blue plastic folder with documents.'],
            ['name' => 'Water Bottle', 'description' => 'Transparent bottle with yellow cap.'],
            ['name' => 'Phone Case', 'description' => 'Red silicone iPhone case.'],
            ['name' => 'Bag', 'description' => 'Small handbag, black with golden zip.'],
        ];

        foreach ($items as $item) {
            $randomUser = $users->random();

            Item::create([
                'name'        => $item['name'],
                'description' => $item['description'],
                'location'    => fake()->city(),
                'code'        => strtoupper(fake()->bothify('?##??#')),
                'status'      => fake()->randomElement([
                    'lost','lost','lost','lost','lost',
                    'found','found','found',
                    'deposited','deposited',
                    'claimed'
                ]),
                'is_visible'  => fake()->boolean(70),
                'reported_by' => $randomUser->id,
                'created_at'  => fake()->dateTimeBetween('-3 days', 'now'),
            ]);
        }
    }
}
