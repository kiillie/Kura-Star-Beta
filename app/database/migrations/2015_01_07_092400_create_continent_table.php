<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContinentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('M_CONTINENT', function($table){
			$table->smallInteger('CONTINENT_ID', true);
			$table->string('CONTINENT_NAME', 50);
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
		Schema::drop('M_CONTINENT');
	}

}