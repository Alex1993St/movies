<?php

namespace App\Http\Controllers\Api;

use App\Models\Film;
use App\Models\Genre;

class ApiController
{
    /*
     * Return all films format json with pagination
     */
    public function films()
    {
        return response(Film::getAllWithPagination());
    }

    /*
     * Return film format json
     */
    public function filmId($id)
    {
        return response(Film::getFilm($id));
    }

    /*
     * Return all genres format json
     */
    public function genres()
    {
        return response(Genre::getAll());
    }

    /*
     * Return all films by genre id format json with pagination
     */
    public function genreId($id)
    {
        return response(Genre::getFilmByGenre($id));
    }
}
