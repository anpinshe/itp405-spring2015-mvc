<?php namespace App\Http\Controllers;
use App\Models\DVD;
use Illuminate\Http\Request;

class DvdController extends Controller {
	public function search(){
		$query = new DVD();
		$genres = $query->getGenre();
		$ratings = $query->getRating();
		return view('search', [
			'genres' => $genres,
			'ratings' => $ratings
		]);
	}
	public function results(Request $request){
		$queryTitle = $request->input('title');
		$queryGenre = $request->input('genre');
		$queryRating = $request->input('rating');
		$dvds = (new DVD())->search($queryTitle, $queryGenre, $queryRating);
		$genre_name = (new DVD())->getGenreName($queryGenre);
		$rating_name = (new DVD())->getRatingName($queryRating);
		return view('results', [
			'title' => $queryTitle,
			'genre' => $genre_name,
			'rating' => $rating_name,
			'dvds' => $dvds
		]);
	}
    
    public function review($id){
        $r_ratings = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10');
        $dvds = (new DVD())->getInfo($id);
        $reviews = (new DVD())->getReviews($id);
        
        return view('review', [
			'id' => $id,
			'dvds' => $dvds,
			'reviews' => $reviews,
            'r_ratings' => $r_ratings
		]);
    }
    
    public function createReview(Request $request){
		$validation = DVD::validate($request->all());
		$dvd_id = $request->input('dvd_id');
 		if($validation->passes()){
 			DVD::create([
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