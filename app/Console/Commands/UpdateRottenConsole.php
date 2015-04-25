<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
//use Illuminate\Contracts\Bus\Dispatcher;
use Bus;
use App\Commands\UpdateRottenRating;
use App\Handlers\Commands\UpdateRottenRatingHandler;

class UpdateRottenConsole extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'rotten:update';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Updates Rotten Tomatoes Ratings';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		/*
		$file = fopen("/home/vagrant/Code/testCommand.txt", "w");
		sleep(5);
		fwrite($file, "ppotyuioptuipoty");
		fclose($file);
		*/
		Bus::dispatch(new UpdateRottenRating());
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [];
		//return [
		//	['example', InputArgument::REQUIRED, 'An example argument.'],
		//];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [];
		//return [
		//	['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
		//];
	}

}
