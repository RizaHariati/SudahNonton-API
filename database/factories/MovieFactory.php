<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $genres_array = array('Sci-Fi & Fantasy', "Drama", "Action & Adventure", "Mystery");
        $rand = collect($genres_array)->random();
        $paragraph = $this->faker->paragraph();
        return [
            'movie_id' => $this->faker->unique()->numberBetween($min = 100, $max = 2000),
            'title' => $this->faker->company(),
            'genres' => $rand,
            'tagline' => $this->faker->words($nb = mt_rand(7, 14), $asText = true),
            'release_date' => $this->faker->date(),
            'overview' => implode(" ", [$paragraph]),
            'is_favorite' => $this->faker->boolean(),
            'my_comment' => implode(" ", [$paragraph]),
        ];
    }
}
