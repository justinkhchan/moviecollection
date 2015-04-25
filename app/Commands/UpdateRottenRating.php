<?php namespace App\Commands;

use App\Commands\Command;

class UpdateRottenRating extends Command {

	public $talk;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		echo "constructor called.\n\n";
	}

}
