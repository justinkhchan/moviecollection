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
		$this->middleware('guest');
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
	public function displayTable()
	{
		$movies = Movie::all();
		
		//echo $movies;
		
		//return "fewafwef";
		//return dd($movies);
		return view('displayTable', ['title' => 'Display Movies', 'movies' => $movies]);
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
