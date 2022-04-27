<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class BlogNewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $title = $this->faker->sentence(rand(3 , 8) , true);
        $txt = $this->faker->realText(rand(1000 , 4000 ));
        $isPublished = rand(1 , 5) > 1;
        $createdAt = $this->faker->dateTimeBetween('-3 months' , '-2 months');

        return [
            'count_like' => rand(1 , 1000),
            'user_id' => 3,//пусть все фейковые записи создал публицист
            'title' => $title,
            'slug' => str_slug($title),
            'content_row' => $txt,
            'content_html' => $txt,
            'is_published' => $isPublished,
            'published_at' => $isPublished ? $this->faker->dateTimeBetween('-3 months' , '-1 days') : null,
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
