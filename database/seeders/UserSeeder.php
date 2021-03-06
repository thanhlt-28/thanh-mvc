<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
                'email' => 'thanhltph08395@fpt.edu.vn',
                'is_admin' => 1,
                'password' => Hash::make('123456')
            ],
            [
                'name' => 'member',
                'email' => 'lothanh28.tl@gmail.com',
                'is_admin' => 0,
                'password' => Hash::make('123456')
            ]
        ];

        foreach ($user_lst as $item) {
            $model = new User();
            $model->fill($item);
            $model->save();
        }
    }
}
