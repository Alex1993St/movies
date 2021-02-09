<?php

namespace App\Models;

use App\Services\File;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'films';
    protected $fillable = ['title', 'image', 'status'];
    public $timestamps = false;

    const NOIMAGE = 'no_image.png';

    /*
     * Get param id
     * Return film by id with genre
     */
    public static function getFilm($id)
    {
        return self::findById($id)->with('genres')->first();
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'film_genre', 'film_id', 'genre_id');
    }

    /*
     * Get param status
     * Return films by status
     */
    public static function getAll($status)
    {
        return self::where('status', $status)->get();
    }

    /*
     * Save film with genre
     */
    public static function insertFilm($request)
    {
        $imageName = $request->image ? app(File::class)->uploadImage($request) : self::NOIMAGE;
        $film_id = self::create(['title' => $request->title, 'image' => $imageName,]);
        if( $request->genre_id ) {
            self::filmGenre($film_id->id, $request);
        }
    }

    /*
     * Update film with genre
     */
    public static function updateFilm($data)
    {
        $imageName = app(File::class)->actionFile($data);

        if( $data->genre_id ) {
            FilmGenre::findFilmById($data->id)->delete();
            self::filmGenre($data->id, $data);
        }

        self::findById($data->id)->update([
            'title' => $data->title,
            'status' => isset($data->status) ? 1 : 0,
            'image' => $imageName,
        ]);
    }

    /*
     * Delete film and his genre in FilmGenre model by id
     */
    public static function deleteFilm($id)
    {
        $film = self::findById($id);
        $image = $film->first();
        if( $image->image != self::NOIMAGE ) {
            app(File::class)->removeFile($image->image);
        }
        $film->delete();

        FilmGenre::findFilmById($id)->delete();
    }

    /*
     * Checked selected genres
     */
    public function isSelected($id)
    {
      return in_array($id, array_column($this->genres->toArray(), 'id')) ? 'selected' : '';
    }

    /*
     * Save genre and film relation
     */
    private static function filmGenre($film_id, $data)
    {
        FilmGenre::saveData($film_id, $data);
    }

    /*
     * Update status film
     */
    public static function updateStatus($data)
    {
        self::findById($data->id)->update(['status' => isset($data->status) ? 1 : 0]);
    }

    /*
    * return pagination films
    */
    public static function getAllWithPagination()
    {
        return self::paginate(10);
    }

    public static function scopeFindById($query, $id)
    {
        return $query->where('id', $id);
    }
}
