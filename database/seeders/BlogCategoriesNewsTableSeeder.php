<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogCategoriesNewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newsCount = 100;
//        100 news
//        11 categories
        $pivotData = [];
        for($newsItem = 1 ; $newsItem <= $newsCount; $newsItem++){
            $countCategories = rand(1 , 5);//пусть максимальное кол-во категорий у новости 5
            for($category = 0; $category <= $countCategories; $category++ ){
                $idCategory = rand(1 , 11);//всего 11 категорий  - беру любой айди
                $pivotData[] = [
                    'blog_category_id' => $idCategory,
                    'blog_news_id' =>  $newsItem
                ];


            }

        }
        \DB::table('blog_category_blog_news')->insert($pivotData);
    }
}
