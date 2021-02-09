<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';
    public $timestamps = false;

    /*
     * return collection genre
     */
    public static function getAll()
    {
        return self::get();
    }

    /*
     * Get param title
     * Save new genre
     */
    public static function insertGenre($title)
    {
        self::insert(['title' => $title]);
    }

    /*
     * Get params id and title
     * update title genre by id
     */
    public static function updateGenre($data)
    {
        self::where('id', $data->id)->update(['title' => $data->title]);
    }

    /*
     * Get param id
     * Delete genre
     */
    public static function deleteGenre($id)
    {
        self::where('id', $id)->delete();
        FilmGenre::where('genre_id', $id)->delete();
    }

    /*
     * Get param id
     * return first genre by id
     */
    public static function getGenre($id)
    {
        return self::where('id', $id)->first();
    }

    /*
     * Get param id
     * Select all films by gender id
     * return films with pagination. 10 elements in one page
     */
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

