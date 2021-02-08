<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;

class ApiController
{
    public function films()
    {
        return response()->json(Film::getAllWithPagination());
    }

    public function filmId($id)
    {
        return response()->json(Film::getFilm($id));
    }

    public function genres()
    {
        return response()->json(Genre::getAll());
    }

    public function genreId($id)
    {
        return response()->json(Genre::getFilmByGenre($id));
    }
}
