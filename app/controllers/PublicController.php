<?php

use KuraStar\Storage\Country\CountryRepository as Country;
use KuraStar\Storage\Continent\ContinentRepository as Continent;
use KuraStar\Storage\Category\CategoryRepository as Category;

class PublicController extends BaseController{
	protected $country;
	protected $continent;

	public function __construct(Continent $continent, Country $country, Category $category){
		$this->continent = $continent;
		$this->country = $country;
		$this->category = $category;
	}
	public function index(){
		$countries = $this->country->showCountryByContinent();
		$continents = $this->continent->show();
		$categories = $this->category->show();
		return View::make('public.index')
				->withCountries($countries)
				->withContinents($continents)
				->withCategories($categories);
	}

	public function registration(){
		return View::make('public.registration');
	}
}

?>