<?php

use App\Models\dvd;
use App\Models\Label;
use App\Models\Genre;
use App\Models\Sound;
use App\Models\Rating;
use App\Models\Format;

Route::get('/', 'WelcomeController@index');

Route::get('/dvds/search', 'DVDController@search');
Route::get('/dvds', 'DVDController@results');

//Route::get('/dvds/{id}', 'DvdController@review');
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