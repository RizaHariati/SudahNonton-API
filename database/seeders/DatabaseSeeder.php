<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\TvShow;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Riza Hariati',
            'email' => 'rizahariati@yahoo.com',
            'password' => bcrypt('thinkglobally'),
        ]);

        Genre::create([
            'id' => 10765,
            'name' => "Sci-Fi & Fantasy",
        ]);

        Genre::create([
            'id' => 18,
            'name' => "Drama",
        ]);

        Genre::create([
            'id' => 10759,
            'name' => "Action & Adventure",
        ]);

        Genre::create([
            'id' => 9648,
            'name' => "Mystery",
        ]);


        // \App\Models\User::factory(10)->create();
    }
}
