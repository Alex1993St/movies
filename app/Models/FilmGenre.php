<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilmGenre extends Model
{
    protected $table = 'film_genre';
    public $timestamps = false;

    public static function scopeFindFilmById($query, $id)
    {
        return $query->where('film_id', $id);
    }

    /*
     *  Save film_id and genre_id to model
     */
    public static function saveData($film_id, $data)
    {
        $getGenresId = $data->genre_id;
        $sizeOf = sizeof($getGenresId);
        $batch = [];
        for ( $i = 0; $i < $sizeOf; $i++ ) {
            $batch[] = [
                'film_id' => $film_id,
                'genre_id' => $getGenresId[$i]
            ];
        }
        FilmGenre::insert($batch);
    }
}
