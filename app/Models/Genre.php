<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';
    public $timestamps = false;

    public static function getAll()
    {
        return self::get();
    }

    public static function insertGenre($title)
    {
        self::insert(['title' => $title]);
    }

    public static function deleteGenre($id)
    {
        self::where('id', $id)->delete();
        FilmGenre::where('genre_id', $id)->delete();
    }

    public static function getGenre($id)
    {
        return self::where('id', $id)->first();
    }

    public static function updateGenre($data)
    {
        self::where('id', $data->id)->update(['title' => $data->title]);
    }

    public static function getFilmByGenre($id)
    {
        $filmsByGenre = self::where('id', $id)->with('films')->first();
        $page = isset($_GET['page']) ? $_GET['page'] : 0;
        return $filmsByGenre->films->forPage($page, 10);
    }

    public function films()
    {
        return $this->belongsToMany(Film::class, 'film_genre', 'genre_id', 'film_id');
    }
}

