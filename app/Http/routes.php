<?php

use App\Models\dvd;
use App\Models\DVDold;
use App\Services\RottenTomatoes;
use App\Models\Sound;
use App\Models\Rating;
use App\Models\Format;

Route::get('/', 'WelcomeController@index');

Route::get('/dvds/search', 'DVDController@search');
Route::get('/dvds', 'DVDController@results');

Route::get('/dvds/{id}', function($id){
    $dvds = (new DVDold())->getInfo($id);
    $reviews = (new DVDold())->getReviews($id);
    $r_ratings = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10');
    $valid = 0;
    //$detail = null;

    if(!empty($dvds)){
        $name = array_values($dvds)[0]->title;
        $info = RottenTomatoes::search($name);
        if(!empty($info)) {
            $detail = array_values($info)[0]->title;
            foreach ($info as $movie) {
                if ($movie->title == $name) {
                    $detail = $movie;
                    //dd($detail);
                    $valid = 1;
                }
            }

            return view('review', [
                'id' => $id,
                'dvds' => $dvds,
                'reviews' => $reviews,
                'r_ratings' => $r_ratings,
                'detail' => $detail,
                "valid" => $valid
            ]);
        }
    }
    return view('review', [
        'id' => $id,
        'dvds' => $dvds,
        'reviews' => $reviews,
        'r_ratings' => $r_ratings,
        "valid" => $valid
    ]);
});
Route::post('/dvds/review', 'DVDController@createReview');

Route::get('/dvds/create', 'DVDController@create');
Route::post('/dvds', 'DVDController@createDVD');
Route::get('/genres/{name}/dvds', function($name){
    $dvds = dvd::with('genre')
        ->whereHas('genre',function($query) use($name){
        $query->where('genre_name','=',$name);
    })->get();


    return view('genre',[
        'dvds' => $dvds,
        'genre_name' => $name,
    ]);
});