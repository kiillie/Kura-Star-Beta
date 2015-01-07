<?php namespace KuraStar\Storage\Continent;

use Continent;

class EloquentContinentRepository implements ContinentRepository{

	public function store($input){
		$continent = new Continent;
		$continent->CONTINENT_NAME = $input['name'];

		return $continent->save();
	}

	public function show(){
		//
		return Continent::all();
	}

	public function getById($id){
		//
	}
}



?>