<?php

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     * php artisan db:seed --class=GenreSeed
     */
    public function run()
    {
        $data = [
            ['title' => 'comedy'],
            ['title' => 'drama'],
            ['title' => 'horror'],
            ['title' => 'detective'],
            ['title' => 'crime'],
        ];

        Genre::insert($data);
    }
}
