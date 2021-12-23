<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
            'release_date' => $this->faker->date,
            'producer' => $this->faker->company,
            'author_id' => Author::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
