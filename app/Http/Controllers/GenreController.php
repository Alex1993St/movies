<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Models\Genre;

class GenreController extends Controller
{
    /*
     * Show list genre
     */
    public function show()
    {
        $genres = Genre::getAll();
        return view('genre.show', ['genres' => $genres]);
    }

    /*
    * Show form to create genre
    */
    public function create()
    {
        return view('genre.create');
    }

    /*
    * Validate from and save new genre
    */
    public function insert(GenreRequest $request)
    {
        if ($title = $request->title) {
           Genre::insertGenre($title);
           return redirect()->route('genre');
        }
        return back();
    }

    /*
    * Show form to edit genre
    */
    public function edit($id)
    {
        $genre = Genre::getGenre($id);
        return view('genre.edit', ['genre' => $genre]);
    }

    /*
    * Validate from and  update genre
    */
    public function update(GenreRequest $request)
    {
        Genre::updateGenre($request);
        return redirect()->route('genre');
    }

    /*
    * Delete genre by id
    */
    public function delete($id)
    {
        Genre::deleteGenre($id);
        return redirect()->route('genre');
    }
}
