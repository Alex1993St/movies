<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Models\Film;

class ActionController extends Controller
{
    /*
     *  return films where status 0
     */
    public function status()
    {
        $films = Film::getAll(0);
        return view('films.status', ['films' => $films]);
    }

    /*
     * Get param id
     * Show form for update status
     */
    public function formUpdateStatus($id)
    {
        $film = Film::getFilm($id);
        return view('films.update_status', ['film' => $film]);
    }

    public function updateStatus(StatusRequest $request)
    {
        Film::updateStatus($request);
        return redirect()->route('film');
    }
}
