<?php

namespace Database\Seeders;

use Faker;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductGallertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=6;$i<100;$i++){
            for($j=1;$j<5;$j++){
                $item = [
                    'pro_id'=>$i,
                    'image' => $faker->imageUrl($width = 640, $height = 640),
                ];
                DB::table('product_galleries')->insert($item); 
            }
        }
    }
}
