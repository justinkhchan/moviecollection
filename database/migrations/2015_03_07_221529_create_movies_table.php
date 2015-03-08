<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('movies', function($table)
		{
			$table->increments('id');
			$table->string('title')->default('');
			$table->date('bought')->nullable();
			$table->decimal('price', 5, 2)->nullable();
			$table->integer('imdb_rating')->unsigned()->nullable();
			$table->string('bought_from')->nullable();
			$table->string('other_notes')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('movies');
	}

}
