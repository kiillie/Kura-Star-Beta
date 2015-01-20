<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('M_CATEGORY', function($table){
			$table->mediumInteger('CATEGORY_ID', true);
			$table->string('CATEGORY_NAME', 50);
			$table->smallInteger('STOP_FLAG', false);
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
		Schema::drop('M_CATEGORY');
	}

}