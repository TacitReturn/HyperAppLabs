<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(3);

        return [
            "user_id" => 1,
            "category_id" => Category::all()->random()->id,
            "title" => $title,
            "slug" => Str::slug($title, "-"),
            "description" => $this->faker->sentence(5),
            "content" => $this->faker->sentence(35),
        ];
    }
}
