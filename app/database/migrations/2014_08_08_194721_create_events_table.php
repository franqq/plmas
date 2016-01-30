<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events' , function($table){
			$table -> increments('id'); 
			$table -> integer('organiser_id');
			$table -> integer('presenter_id');
			$table -> integer('room_id');
			$table ->string('pic_id');
			$table -> string('title');
			$table -> text('overview');
			$table -> date('date');
			$table -> integer('attendance');
			$table -> timestamps();
		});
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');
	}

}
