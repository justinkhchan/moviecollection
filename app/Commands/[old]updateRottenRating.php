<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class updateRottenRating extends Command implements SelfHandling {

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		echo "constructor called.\n\n";
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		echo "handled!\n";
		event(new RottenRatingsUpdated());
	}

}
