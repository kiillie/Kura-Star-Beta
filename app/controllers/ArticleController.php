<?php


use KuraStar\Storage\Country\CountryRepository as Country;
use KuraStar\Storage\Category\CategoryRepository as Category;
use KuraStar\Storage\Continent\ContinentRepository as Continent;
use KuraStar\Storage\Article\ArticleRepository as Article;

class ArticleController extends BaseController{

	protected $country;
	protected $category;
	protected $continent;
	protected $article;

	public function __construct(Country $country, Category $category, Continent $continent, Article $article){
		$this->country = $country;
		$this->category = $category;
		$this->continent = $continent;
		$this->article = $article;
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

	public function store(){
		$article = $this->article->store(Input::all());

		if($article){
			return Redirect::route('article.create')
					->with('message', 'Article Successfully created.');
		}
		else{
			return Redirect::route('article.create')
					->with('message', 'Article was not created.');
		}
	}

	public function show($id){
		$countries = $this->country->showCountryByContinent();
		$categories = $this->category->show();
		$continents = $this->continent->show();
		$article = $this->article->show($id);
		$country = $this->country->getById($article->COUNTRY_ID);
		$category = $this->category->getById($article->CATEGORY_ID);

		return View::make('articles.view')
				->withCountries($countries)
				->withCategories($categories)
				->withContinents($continents)
				->withArticle($article)
				->withCountry($country)
				->withCategory($category);
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

		$articles = $this->article->getByCountryCategory($selected_country->COUNTRY_ID, $selected_category->CATEGORY_ID);

		return View::make('articles.article_by_country_category')
				->withCountries($countries)
				->withCategories($categories)
				->withContinents($continents)
				->withCtry($selected_country)
				->withCat($selected_category)
				->withArticles($articles);
	}
}

?>