<?php


use KuraStar\Storage\Country\CountryRepository as Country;
use KuraStar\Storage\Category\CategoryRepository as Category;
use KuraStar\Storage\Continent\ContinentRepository as Continent;

class ArticleController extends BaseController{
	
	protected $country;
	protected $category;
	protected $continent;

	public function __construct(Country $country, Category $category, Continent $continent){
		$this->country = $country;
		$this->category = $category;
		$this->continent = $continent;
	}

	public function index(){
		$countries = $this->country->showCountryByContinent();
		$categories = $this->category->show();
		$continents = $this->continent->show();
		return View::make('articles.create')
				->withCountries($countries)
				->withCategories($categories)
				->withContinents($continents);
	}

	public function show(){
		$countries = $this->country->showCountryByContinent();
		$categories = $this->category->show();
		$continents = $this->continent->show();
		return View::make('articles.view')
				->withCountries($countries)
				->withCategories($categories)
				->withContinents($continents);
	}

	public function showByCategory(){
		$countries = $this->country->showCountryByContinent();
		$categories = $this->category->show();
		$continents = $this->continent->show();
		return View::make('articles.article_by_category')
				->withCountries($countries)
				->withCategories($categories)
				->withContinents($continents);
	}

	public function showByCountryAndCategory(){
		$selected_country = $this->country->getById(Input::get('ctry-sel'));
		$selected_category = $this->category->getById(Input::get('cat-sel'));
		$countries = $this->country->showCountryByContinent();
		$categories = $this->category->show();
		$continents = $this->continent->show();
		foreach($selected_country as $co){
			$ctry['name'] = $co->COUNTRY_NAME;
			$ctry['id'] = $co->COUNTRY_ID;
		}
		foreach($selected_category as $c){
			$cat['name'] = $c->CATEGORY_NAME;
			$cat['id'] = $c->CATEGORY_ID;
		}

		return View::make('articles.article_by_country_category')
				->withCountries($countries)
				->withCategories($categories)
				->withContinents($continents)
				->withCtry($ctry)
				->withCat($cat);
	}
}

?>