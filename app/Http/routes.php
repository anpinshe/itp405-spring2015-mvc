<?php

Route::get('/', 'WelcomeController@index');

Route::get('/dvds/search', 'DVDController@search');
Route::get('/dvds', 'DVDController@results');

Route::get('/dvds/{id}', 'DvdController@review');
Route::post('/dvds/review', 'DvdController@createReview');