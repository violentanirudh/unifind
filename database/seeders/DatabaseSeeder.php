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
        User::factory(3)->create();

        $users = User::all();

        foreach (range(1, rand(20, 50)) as $index) {

            $randomUser = $users->random();

            Item::factory()->create([
                'reported_by' => $randomUser->id
            ]);
        }
    }
}
