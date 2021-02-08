<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'films';
    protected $fillable = ['title', 'image', 'status'];
    public $timestamps = false;

    const NOIMAGE = 'no_image.png';

    public static function getAll($status)
    {
        return self::where('status', $status)->get();
    }

    public static function insertFilm($request)
    {
        if ($request->image) {
            $imageName =  self::uploadImage($request);
        } else {
            $imageName = self::NOIMAGE;
        }

        $film_id = self::create([
            'title' => $request->title,
            'image' => $imageName,
        ]);

        if( $request->genre_id ) {
            self::filmGenre($film_id->id, $request);
        }
    }

    public static function deleteFilm($id)
    {
        $film = self::where('id', $id);
        $image = $film->first();
        if( $image->image != self::NOIMAGE ) {
            self::removeFile($image->image);
        }
        $film->delete();

        FilmGenre::where('film_id', $id)->delete();
    }

    public static function getFilm($id)
    {
        return self::where('id', $id)->with('genres')->first();
    }

    public static function updateFilm($data)
    {
        if( $data->image ) {
            $imageName =  self::uploadImage($data);
            if( $data->old_image != self::NOIMAGE ) {
                self::removeFile($data->old_image);
            }
        } else {
            $imageName = $data->old_image;
        }

        if( $data->genre_id ) {
            FilmGenre::where('film_id', $data->id)->delete();
            self::filmGenre($data->id, $data);
        }

        self::where('id', $data->id)->update([
            'title' => $data->title,
            'status' => isset($data->status) ? 1 : 0,
            'image' => $imageName,
        ]);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'film_genre', 'film_id', 'genre_id');
    }

    public function isSelected($id)
    {
      return in_array($id, array_column($this->genres->toArray(), 'id')) ? 'selected' : '';
    }

    private static function filmGenre($film_id, $data)
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

    public static function updateStatus($data)
    {
        self::where('id', $data->id)->update(['status' => isset($data->status) ? 1 : 0]);
    }

    public static function uploadImage($data)
    {
        $imageName = time() . '.' . $data->image->extension();
        $data->image->move(storage_path('image'), $imageName);
        return $imageName;
    }

    public static function removeFile($image)
    {
        unlink(storage_path('image') . '/'  . $image);
    }

    public static function getAllWithPagination()
    {
        return self::paginate(10);
    }
}
