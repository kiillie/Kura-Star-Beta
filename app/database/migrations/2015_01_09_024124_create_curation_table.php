<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('T_CURATION', function($table){
			$table->mediumInteger('CURATION_ID', true);
			$table->mediumInteger('COUNTRY_ID', false);
			$table->mediumInteger('CATEGORY_ID', false);
			$table->mediumInteger('CURATER_ID', false);
			$table->string('CURATION_TITLE', 50);
			$table->string('CURATION_DESCRIPTION', 150)->nullable();
			$table->text('CURATION_DETAIL')->nullable();
			$table->string('CURATION_IMAGE')->nullable();
			$table->mediumInteger('PV', false)->nullable();
			$table->text('TAG')->nullable();
			$table->smallInteger('CURATION_STATUS', false)->default(0);
			$table->integer('VIEWS', false)->default(0);
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
		Schema::drop('T_CURATION');
	}

}
