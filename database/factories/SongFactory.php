<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'playlist_id' =>1,
            'song_name' => $this->faker->name(),
            'description' =>$this->faker->paragraph(),
        ];
    }
}
