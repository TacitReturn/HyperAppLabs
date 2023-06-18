<?php

namespace Database\Factories;

    use App\Models\Category;
    use Illuminate\Database\Eloquent\Factories\Factory;

    class CategoryFactory extends Factory
    {
        /**
         * Define the model's default state.
         */
        public function definition(): array
        {
            $categories = [
                'Laravel',
                'Vue',
                'PHP',
                'JavaScript',
                'React',
            ];

            $collection = collect($categories);

            $collection->each(function ($category) {
                Category::create(
                    [
                        'name' => $category,
                    ]
                );
            });

            return [
                'name' => array_rand(array_flip($categories)),
            ];
        }
    }
