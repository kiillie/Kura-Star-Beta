<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFbUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('fb_users', function($table){
			$table->bigIncrements('CURATER_ID', false);
			$table->string('CURATER', 80);
			$table->string('CURATER_IMAGE', 100)->nullable();
			$table->string('CURATER_DESCRIPTION', 500)->nullable();
			$table->string('CURATER_SITE', 100)->nullable();
			$table->timestamp(BaseModel::CREATED_AT);
			$table->timestamp(BaseModel::UPDATED_AT);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('fb_users');
	}

}
