<?php

namespace Database\Seeders;

use App\Models\BlogNews;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(BlogCategoriesTableSeeder::class);
        //если хочу создать тест данные - фабрикой ) заранее ее определяю в database/factories
        //с начала категории потом посты ) так как посты используют категории
        BlogNews::factory(100)->create();

        $this->call(BlogCategoriesNewsTableSeeder::class);

    }
}
