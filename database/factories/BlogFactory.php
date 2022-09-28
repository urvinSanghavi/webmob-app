<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'title' => $this->faker->sentence,

            'body' => $this->faker->text,

            'user_id' => mt_rand(1,5),

            'category_id' => mt_rand(1,5),

        ];

    }
}
