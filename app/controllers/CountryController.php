<?php

use KuraStar\Storage\Continent\ContinentRepository as Continent;
use KuraStar\Storage\Country\CountryRepository as Country;

class CountryController extends BaseController{
	protected $country;
	protected $continent;

	public function __construct(Continent $continent, Country $country){
		$this->continent = $continent;
		$this->country = $country;
	}

	public function createContinent(){
		return View::make('admin.create_continent');
	}

	public function storeContinent(){
		$continent = $this->continent->store(Input::all());

		if($continent){
			return Redirect::route('continent.create')
					->with('message', 'Continent Successfully Added');
		}
		else{
			return Redirect::route('continent.create')
					->with('message', 'Continent was not Added.');
		}
	}

	public function createCountry(){
		$continents = $this->continent->show();
		return View::make('admin.create_country')
				->withContinents($continents);
	}

	public function storeCountry(){
		$country = $this->country->store(Input::all());

		if($country){
			return Redirect::route('country.create')
					->with('message', 'Country Addedd Successfully');
		}
		else{
			return Redirect::route('country.create')
					->with('message', 'Country was not Added');
		}
	}
}

?>