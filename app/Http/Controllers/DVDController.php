<?php namespace App\Http\Controllers;
use App\Models\DVDold;
use Illuminate\Http\Request;

use App\Models\Label;
use App\Models\Format;
use App\Models\Rating;
use App\Models\Sound;
use App\Models\Genre;
use App\Models\dvd;

class DvdController extends Controller {
	public function search(){
		//$query = new DVD();
        $genres = Genre::all();
		$ratings = Rating::all();
		return view('search', [
			'genres' => $genres,
			'ratings' => $ratings
		]);
	}
	public function results(Request $request){
		$queryTitle = $request->input('title');
		$queryGenre = $request->input('genre');
		$queryRating = $request->input('rating');
		$dvds = (new DVDold())->search($queryTitle, $queryGenre, $queryRating);
		$genre_name = (new DVDold())->getGenreName($queryGenre);
		$rating_name = (new DVDold())->getRatingName($queryRating);
        
        //dd($dvds);
        
		return view('results', [
			'title' => $queryTitle,
			'genre' => $genre_name,
			'rating' => $rating_name,
			'dvds' => $dvds
		]);
	}

    public function create(){
        $labels = Label::all();
        $sounds = Sound::all();
        $genres = Genre::all();
        $ratings = Rating::all();
        $formats = Format::all();
        return view('create', [
            'labels' => $labels,
            'sounds' => $sounds,
            'genres' => $genres,
            'ratings' => $ratings,
            'formats' => $formats
        ]);
    }

    public function createDVD(Request $r){
        $validation = \Validator::make($r->all(),[
            'title' => 'required'
        ]);

        if($validation->passes()) {
            $dvd = new dvd();
            $dvd->title = $r->input('title');
            $dvd->label_id = $r->input('label');
            $dvd->genre_id = $r->input('genre');
            $dvd->sound_id = $r->input('sound');
            $dvd->rating_id = $r->input('rating');
            $dvd->format_id = $r->input('format');

            $dvd->save();

            return redirect('/dvds/create')->with('success', 'DVD is now successfully inserted');
        }
            return redirect('/dvds/create')->withInput()->withErrors($validation);
    }
    
    public function review($id){
        $r_ratings = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10');
        $dvds = (new DVDold())->getInfo($id);
        $reviews = (new DVDold())->getReviews($id);
        
        return view('review', [
			'id' => $id,
			'dvds' => $dvds,
			'reviews' => $reviews,
            'r_ratings' => $r_ratings
		]);
    }
    
    public function createReview(Request $request){
		$validation = DVDold::validate($request->all());
		$dvd_id = $request->input('dvd_id');
 		if($validation->passes()){
 			DVDold::create([
 				'rating' => $request->input('r_rating'),
 				'title' => $request->input('r_title'),
 				'description' => $request->input('r_desc'),
 				'dvd_id' => $request->input('dvd_id')
 			]);
 			return redirect('/dvds/' . $dvd_id)->with('success', 'Review successfully saved');
 		}else{
 			return redirect('/dvds/' . $dvd_id)
 				->withInput()
 				->withErrors($validation);
 		}
	}
    
    
}