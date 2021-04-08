<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_lst = [
            [
                'name' => 'administrator',
                'email' => 'vuongxang@gmail.com',
                'password' => Hash::make('123123123')
            ],
            [
                'name' => 'member',
                'email' => 'vuongxang01@gmail.com',
                'password' => Hash::make('123123123')
            ]
        ];

        foreach($user_lst as $item){
            $model = new User();
            $model->fill($item);
            $model->save();
        }
    }
}
