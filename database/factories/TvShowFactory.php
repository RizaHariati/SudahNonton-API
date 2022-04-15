<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TvShow>
 */
class TvShowFactory extends Factory
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
            'tv_id' => $this->faker->unique()->numberBetween($min = 100, $max = 2000),
            'name' => $this->faker->company(),
            'genres' => $rand,
            'tagline' => $this->faker->words($nb = mt_rand(7, 14), $asText = true),
            'number_of_seasons' => mt_rand(1, 15),
            'overview' => implode(" ", [$paragraph]),
            'is_favorite' => $this->faker->boolean(),
            'my_comment' => implode(" ", [$paragraph]),
        ];
    }
}
