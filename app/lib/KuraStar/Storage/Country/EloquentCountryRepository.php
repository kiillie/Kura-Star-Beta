<?php namespace KuraStar\Storage\Country;

use Country;

class EloquentCountryRepository implements CountryRepository{

	public function store($input){
		if($input['continent'] != 0){
			$country = new Country;
			$country->COUNTRY_NAME = $input['name'];
			$country->CONTINENT_ID = $input['continent'];

			return $country->save();
		}
		else{
			return false;
		}
	}

	public function show(){
		//
	}

	public function showCountryByContinent(){
		return Country::orderBy('COUNTRY_ID', 'ASC')->get();
		// return Country::orderBy('COUNTRY_ID', 'asc')->get();
	}
}

?>