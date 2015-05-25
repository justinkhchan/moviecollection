<?php namespace App\Handlers\Commands;

use App\Commands\UpdateRottenRating;

use Illuminate\Queue\InteractsWithQueue;
use App\Movie;
use GuzzleHttp\Client;

class UpdateRottenRatingHandler {

	/**
	 * Handle the command.
	 *
	 * @param  UpdateRottenRating  $command
	 * @return void
	 */
	public function handle(UpdateRottenRating $command)
	{
		//dd($command);
		echo "handled!" . "\n";
		$movies = Movie::all();
		//$currMovie = Movie::find(1);
		
		$client = new Client();
		
		$file = fopen("/home/vagrant/Code/testCommand.txt", "w");
		
		foreach($movies as $currMovie)
		{
			if (($currMovie->rt_rating == 0) || (is_null($currMovie->rt_rating)) || !$command->getOnlyUndefs()) {
				$apiTitle = $currMovie->title;
				if (!(is_null($currMovie->api_name))) {
					$apiTitle = $currMovie->api_name;
				}
				
				$response = $client->get('http://omdbapi.com/?tomatoes=true&t=' . $apiTitle);
				fwrite($file, $currMovie->title . "\n\t");
				if ($response->getStatusCode() == 200) {
					$jsonObj = json_decode($response->getBody());
					$gotResponse = $jsonObj->Response;
					if (isset($gotResponse) && $gotResponse == "True") {
						$rtRating = $jsonObj->tomatoMeter;
						if (isset($rtRating)) {
							//fwrite($file, $currMovie->title . "\n\t" . $response->getBody() . "\n");
							fwrite($file, $rtRating . "\n");
							$currMovie->rt_rating = $rtRating;
							$currMovie->save();
						} else {
							fwrite($file, "no rating defined!" . "\n");
						}
					} else {
						fwrite($file, "movie not found!" . "\n");
					}
				} else {
					fwrite($file, "not 200!" . "\n");
				}
				sleep(1);
			}
		}
		
		//fwrite($file, "wefwfwefkjlkjklwef");
		//sleep(2);
		
		fclose($file);
		//event(new RottenRatingsUpdated());
	}

}
