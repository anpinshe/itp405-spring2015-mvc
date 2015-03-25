<?php
namespace App\Services;

use Cache;

class RottenTomatoes{
    public static function search($title){
        if(Cache::has("details-$title")){
            $string = Cache::get("details-$title");
        }
        else{
            $url_string = urlencode($title);

            $url = "http://api.rottentomatoes.com/api/public/v1.0/movies.json?page=1&apikey=6erjq72drb4ykqqpzp2e7pqv&q=$url_string";
            $string = file_get_contents($url);
            Cache::put("details-$title", $string, 60);
        }
        return json_decode($string)->movies;
    }
}