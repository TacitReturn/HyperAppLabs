<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tags = [
            'TDD',
            'Agile Workflow',
            'Software Development',
            'Cloud Infrastructure',
            'UI/UX Design',
        ];

        $tagCollection = collect($tags);

        $tagCollection->each(function ($tag) {
            Tag::create(
                [
                    'name' => $tag,
                ]
            );
        });

        return [
            'name' => array_rand(array_flip($tagCollection->toArray())),
        ];
    }
}
