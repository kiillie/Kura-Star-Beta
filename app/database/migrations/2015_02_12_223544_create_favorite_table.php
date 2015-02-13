<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoriteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('t_favorite', function($table){
			$table->mediumInteger('CURATION_ID', false);
			$table->mediumInteger('CURATER_ID', false);
			$table->primary(['CURATER_ID', 'CURATION_ID']);
			$table->timestamp(BaseModel::CREATED_AT);
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
		Schema::drop('t_favorite');
	}

}
