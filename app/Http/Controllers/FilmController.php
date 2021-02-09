<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmRequest;
use App\Models\Film;
use App\Models\Genre;


class FilmController extends Controller
{
    /*
     * Show films where status 1
     */
    public function show()
    {
        $films = Film::getAll(1);
        return view('films.show', ['films' => $films]);
    }

    /*
    * Show form to create film
    */
    public function create()
    {
        $genres = Genre::getAll();
        return view('films.create', ['genres' => $genres]);
    }

    /*
    * Save new film
    */
    public function insert(FilmRequest $request)
    {
        if ($request) {
            Film::insertFilm($request);
            return redirect()->route('film');
        }
        return back();
    }

    /*
    * Show form to edit film
    */
    public function edit($id)
    {
        $film = Film::getFilm($id);
        $genres = Genre::getAll();
        return view('films.edit', ['genres' => $genres, 'film' => $film]);
    }

    /*
    * Update film by id
    */
    public function update(FilmRequest $request)
    {
        Film::updateFilm($request);
        return redirect()->route('film');
    }

    /*
    * Delete film by id
    */
    public function delete($id)
    {
        Film::deleteFilm($id);
        return redirect()->route('film');
    }
}
