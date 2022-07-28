<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            "user_id" => 1,
            "category_id" => Category::all()->random()->id,
            "title" => $this->faker->sentence(3),
            "description" => $this->faker->sentence(5),
            "content" => $this->faker->sentence(35),
        ];
    }
}
