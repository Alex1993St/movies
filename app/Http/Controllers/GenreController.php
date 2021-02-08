<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function show()
    {
        $genres = Genre::getAll();

        return view('genre.show', ['genres' => $genres]);
    }

    public function create()
    {
        return view('genre.create');
    }

    public function insert(Request $request)
    {
        if ($title = $request->title) {
           Genre::insertGenre($title);
           return redirect()->route('genre');
        }

        return back();
    }

    public function delete($id)
    {
        Genre::deleteGenre($id);
        return redirect()->route('genre');
    }

    public function edit($id)
    {
        $genre = Genre::getGenre($id);
        return view('genre.edit', ['genre' => $genre]);
    }

    public function update(Request $request)
    {
        Genre::updateGenre($request);
        return redirect()->route('genre');
    }
}
