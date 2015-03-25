<?php namespace App\Models;
use DB;
use Validator;
class DVDold{
	public function getGenre(){
		return DB::table('genres')->get();
	}
	public function getRating(){
		return DB::table('ratings')->get();
	}
	public function search($title, $genre, $rating){
		$query = DB::table('dvds')
		->join('genres', 'genres.id', '=', 'dvds.genre_id')
		->join('ratings', 'ratings.id', '=', 'dvds.rating_id')
		->join('formats', 'formats.id', '=', 'dvds.format_id')
		->join('labels', 'labels.id', '=', 'dvds.label_id')
		->join('sounds', 'sounds.id', '=', 'dvds.sound_id')
		->where('title', 'LIKE', '%' . $title . '%');
		
		if($genre){
			$query->where('genre_id', '=', $genre);
		}
		if($rating){
			$query->where('rating_id', '=', $rating);
		}
        $query->select('dvds.*', 'dvds.id', 'title', 'ratings.rating_name', 'genres.genre_name', 'labels.label_name', 'sounds.sound_name', 'formats.format_name');
		$query->orderBy('dvds.id', 'asc');
		return $query->get();
	}
	public function getGenreName($genre){
		if($genre){
			return DB::table('genres')
			->where('id', '=', $genre)
			->pluck('genre_name');
		}

        return "N/A";
		
	}
	public function getRatingName($rating){
		if($rating){
			return DB::table('ratings')
			->where('id', '=', $rating)
			->pluck('rating_name');
		}
        return "N/A";
	}
    
    public static function validate($input){
        return Validator::make($input, [
            'r_rating' => 'required|numeric',
            'r_title' => 'required|min:5',
            'r_desc' => 'required|min:20',
            'dvd_id' => 'required|integer'
            
        ]);
    }
    
    public static function create($data){
		return DB::table('reviews')->insert($data);
	}
    
    public function getInfo($id){
        $query = DB::table('dvds')
		->join('genres', 'genres.id', '=', 'dvds.genre_id')
		->join('ratings', 'ratings.id', '=', 'dvds.rating_id')
		->join('formats', 'formats.id', '=', 'dvds.format_id')
		->join('labels', 'labels.id', '=', 'dvds.label_id')
		->join('sounds', 'sounds.id', '=', 'dvds.sound_id')
		->where('dvds.id', '=', $id);
		return $query->get();
    }
    
    
    public function getReviews($id){
        $query = DB::table('reviews')
		->where('dvd_id', '=', $id);
		return $query->get();
    }
    
    
}