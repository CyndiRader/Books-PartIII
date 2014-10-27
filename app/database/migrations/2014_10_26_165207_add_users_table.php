<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	  Schema::create('users', function($table){
		$table->increments('id');
		$table->string('username');
		$table->string('password');
		$table->boolean('is_admin');
		$table->string('remember_token')->nullable();
		$table->timestamps();
		});		}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');	
	}

}
