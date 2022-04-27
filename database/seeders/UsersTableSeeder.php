<?php

namespace Database\Seeders;

//use DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            //bcrypt - хэш пароля
            [
                'name' => 'Менеджер',
                'email' => 'manager@g.g',
                'password' => bcrypt('123123923993'),
                'type'  => 0
            ],
            [
                'name' => 'Админ',
                'email' => 'admin@g.g',
                'password' => bcrypt('123123'),
                'type'  => 1
            ],
            [
                'name' => 'Публицист',
                'email' => 'publisher@g.g',
                'password' => bcrypt('123123'),
                'type'  => 3
            ],
        ];
        \DB::table('users')->insert($data);
    }
}
