<?php namespace App\Http\Controllers;

use App\Commands\UpdateRottenRating;
use App\Handlers\Commands\UpdateRottenRatingHandler;
use App\Movie;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function displayTable($sortBy = 'title', $orderBy = 'ascend')
	{
		if ($sortBy != 'title' && $sortBy != 'bought' && $sortBy != 'price' && $sortBy != 'bought_from' && $sortBy != 'other_notes' && $sortBy != 'rt_rating') {
			$sortBy = 'title';
		}

		$movies = [];
		
		if ($orderBy != 'descend' && $orderBy != 'desc') {
			$orderBy = 'asc';
			$orderLink = 'desc';
			$movies = Movie::all()->sortBy($sortBy);
		} else {
			$orderLink = 'asc';
			$movies = Movie::all()->sortByDesc($sortBy);
		}
		
		//echo $movies;
		
		//return "fewafwef";
		//return dd($movies);
		return view('displayTable', ['title' => 'Display Movies', 
			'movies' => $movies, 
			'orderLink' => $orderLink,
			//'sortBy' => $sortBy,
			]);
	}
	
	public function statistics($assumePrice = '5')
	{
	
		$numMovies = Movie::all()->count();
		$numPriceDefined = Movie::whereNotNull('price')->where('price', '<>', 0)->count();
		$totalSum = Movie::whereNotNull('price')->where('price', '<>', 0)->sum('price');
		$totalSumAssume = $totalSum;
		if (!is_float($assumePrice)) {
			$assumePrice = 5;
		}
		$totalSumAssume = $totalSum + (($numMovies - $numPriceDefined) * $assumePrice);
		$avgExcludeUndef = $totalSum / $numPriceDefined;
		$avgIncludeUndef = $totalSum / $numMovies;
		
		$medianPrice = 0;
		if ($numPriceDefined % 2 == 0) {
			$medianMovie = Movie::whereNotNull('price')->where('price', '<>', 0)->orderBy('price')->get()[$numPriceDefined / 2];
			$medianPrice = $medianMovie->price;
		} else {
			$floorMovie = Movie::whereNotNull('price')->where('price', '<>', 0)->orderBy('price')->get()[floor($numPriceDefined / 2)];
			$ceilMovie = Movie::whereNotNull('price')->where('price', '<>', 0)->orderBy('price')->get()[ceil($numPriceDefined / 2)];
			$medianPrice = ($floorMovie->price + $ceilMovie->price) / 2;
		}
	
		return view('statistics', ['title' => 'Statistics', 
			'numMovies' => $numMovies,
			'totalSum' => $totalSum,
			'totalSumAssume' => $totalSumAssume,
			'assumePrice' => $assumePrice,
			'numPriceDefined' => $numPriceDefined,
			'avgExcludeUndef' => $avgExcludeUndef,
			'avgIncludeUndef' => $avgIncludeUndef,
			'medianPrice' => $medianPrice,
			]);
	}
	
	public function testFunction()
	{
		//return "awefawf";
		
		/*
		$file = fopen("/home/vagrant/Code/testCommand.txt", "w");
		fwrite($file, "wefwfwefkjlkjklwef");
		fclose($file);
		return "qweqewqe";
		*/
		
		//$talk = Talk::findOrFail(1);
		//$this->dispatch(new UpdateRottenRating($talk))
		
		$this->dispatch(new UpdateRottenRating());
		
		return "wefwef";
		
	}

}
