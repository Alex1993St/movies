<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function show()
    {
        $films = Film::getAll(1);

        return view('films.show', ['films' => $films]);
    }

    public function create()
    {
        $genres = Genre::getAll();

        return view('films.create', ['genres' => $genres]);
    }

    public function insert(Request $request)
    {
        if ($request) {
            Film::insertFilm($request);
            return redirect()->route('film');
        }

        return back();
    }

    public function delete($id)
    {
        Film::deleteFilm($id);
        return redirect()->route('film');
    }

    public function edit($id)
    {
        $film = Film::getFilm($id);
        $genres = Genre::getAll();
        return view('films.edit', ['genres' => $genres, 'film' => $film]);
    }

    public function update(Request $request)
    {
        Film::updateFilm($request);
        return redirect()->route('film');
    }

    public function status()
    {
        $films = Film::getAll(0);

        return view('films.status', ['films' => $films]);
    }

    public function formUpdateStatus($id)
    {
        $film = Film::getFilm($id);
        return view('films.update_status', ['film' => $film]);
    }

    public function updateStatus(Request $request)
    {
        Film::updateStatus($request);
        return redirect()->route('film');
    }
}
