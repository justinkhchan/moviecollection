<?php namespace App\Commands;

use App\Commands\Command;

class UpdateRottenRating extends Command {

	public $talk;
	private $onlyUndefs;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	 
	public function __construct($option)
	{
		echo "option: " . $option . "\n\n";
		$this->onlyUndefs = $option;
		echo "constructor called.\n\n";
	}

	public function getOnlyUndefs()
	{
		return $this->onlyUndefs;
	}
	
}
