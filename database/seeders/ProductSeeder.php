<?php

namespace Database\Seeders;
use Faker;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i <100 ; $i++) { 
            $item = [
                'name' => $faker->name,
                'short_desc' =>$faker->text(),
                'content' =>$faker->text(),
                'price'=> rand(800000,1000000),
                'sale_price'=>rand(300000,500000),
                'cate_id'=>rand(1,10),
            ];
            DB::table('products')->insert($item); 
    }
}
}
