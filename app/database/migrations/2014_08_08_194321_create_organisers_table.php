<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganisersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organisers' , function($table){
			$table->increments('id');
			$table -> integer('user_id');
			$table->string('firstname', 60);
			$table->string('lastname', 60);
			$table->timestamps();
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
		Schema::drop('organisers');
	}

}
