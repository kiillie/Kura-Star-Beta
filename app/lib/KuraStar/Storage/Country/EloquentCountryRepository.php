<?php namespace KuraStar\Storage\Country;

class EloquentContryRepository implements CountryRepository{

	public function store(){
		//
	}

	public function show(){
		return M_COUNTRY::all();
	}
}

?>