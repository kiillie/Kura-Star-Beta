<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('M_COUNTRY', function($table){
			$table->mediumInteger('COUNTRY_ID', true, true);
			$table->string('COUNTRY_NAME', 50);
			$table->smallInteger('STOP_FLAG', false)->nullable();
			$table->timestamp(Basemodel::CREATED_AT);
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
		Schema::drop('M_COUNTRY');
	}

}
