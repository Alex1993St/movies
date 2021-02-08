<?php

use App\Models\FilmGenre;
use Illuminate\Database\Seeder;

class FilmGenreSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     * php artisan db:seed --class=FilmGenreSeed
     */
    public function run()
    {
        $data = [
            [
                'film_id' => $this->randId(),
                'genre_id' => $this->randId()
            ], [
                'film_id' => $this->randId(),
                'genre_id' => $this->randId()
            ], [
                'film_id' => $this->randId(),
                'genre_id' => $this->randId()
            ], [
                'film_id' => $this->randId(),
                'genre_id' => $this->randId()
            ], [
                'film_id' => $this->randId(),
                'genre_id' => $this->randId()
            ],
        ];

        FilmGenre::insert($data);
    }

    public function randId()
    {
        return mt_rand(1, 5);
    }
}
