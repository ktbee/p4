<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddComicTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comic_tag', function($table) {
		
			$table->integer('comic_id')->unsigned();
			$table->integer('tag_id')->unsigned();
			

			$table->foreign('comic_id')->references('id')->on('comics');
			$table->foreign('tag_id')->references('id')->on('tags';
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comic_tag');
	}

}
