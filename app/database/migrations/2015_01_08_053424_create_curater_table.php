<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuraterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('T_CURATER', function($table){
			$table->mediumInteger('CURATER_ID', true);
			$table->string('CURATER', 100);
			$table->string('MAIL_ADDRESS', 50);
			$table->string('PASSWORD', 70);
			$table->string('CURATER_IMAGE', 100)->nullable();
			$table->string('CURATER_DESCRIPTION', 500)->nullable();
			$table->string('CURATER_SITE', 100)->nullable();
			$table->smallInteger('STOP_FLAG', false)->nullable();
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
		Schema::drop('T_CURATER');
	}

}
