<?php

Route::get('/', 'WelcomeController@index');

Route::get('/dvds/search', 'DVDController@search');
Route::get('/dvds', 'DVDController@results');
