<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 30; $i++) {

            Product::create([
                'name' => $faker->name(),
                'description' => $faker->text($maxNbChars = 200),
                'amount' => rand(10,30),
                'image' => $faker->imageUrl($width = 640, $height = 480),
                'category_id' => rand(1,4)
            ]);
        }
    }
}
