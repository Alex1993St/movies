<?php

use Illuminate\Database\Seeder;
use App\Models\Film;

class FilmSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     * php artisan db:seed --class=FilmSeed
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Bad Boys',
                'status' => '1',
                'image' => 'no_image.png'
            ],
            [
                'title' => 'Avenger',
                'status' => '1',
                'image' => 'no_image.png'
            ],
            [
                'title' => 'Avatar',
                'status' => '1',
                'image' => 'no_image.png'
            ],
            [
                'title' => 'Saw',
                'status' => '1',
                'image' => 'no_image.png'
            ],
            [
                'title' => 'Sherlock Holmes',
                'status' => '1',
                'image' => 'no_image.png'
            ],
        ];

        Film::insert($data);
    }
}
