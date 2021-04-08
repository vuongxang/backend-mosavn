<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i <10 ; $i++) { 
            $item = [
                'name' => $faker->name,
                'image' => $faker->imageUrl($width = 640, $height = 480),
                'desc' =>$faker->text(),
            ];
            DB::table('categories')->insert($item); 
        }
    }
}
