<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $fake = Faker::create();

        // Get all category ids from the table
        $categoryIds = DB::table('category')->pluck('id')->toArray();

        if (empty($categoryIds)) {
            $this->command->warn('Category table is empty');
            return;
        }

        $products = [];

        for ($i = 0; $i < 30; $i++) {
            $products[] = [
                'name' => $fake->word,
                'description' => $fake->sentence,
                'price' => $fake->randomFloat(2, 100, 1000),
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('product')->insert($products);
    }
}
