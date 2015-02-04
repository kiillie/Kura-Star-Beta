<?php


use KuraStar\Storage\Country\CountryRepository as Country;
use KuraStar\Storage\Category\CategoryRepository as Category;
use KuraStar\Storage\Continent\ContinentRepository as Continent;
use KuraStar\Storage\Article\ArticleRepository as Article;
use KuraStar\Storage\User\UserRepository as User;

class ArticleController extends BaseController{

	protected $country;
	protected $category;
	protected $continent;
	protected $article;
	protected $user;

	public function __construct(Country $country, Category $category, Continent $continent, Article $article, User $user){
		$this->country = $country;
		$this->category = $category;
		$this->continent = $continent;
		$this->article = $article;
		$this->user = $user;
	}

	public function index(){
		$countries = $this->country->showCountryByContinent();
		$categories = $this->category->show();
		$continents = $this->continent->show();
		return View::make('articles.create_test')
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
		$users = $this->user->allUsers();
		$countries = $this->country->showCountryByContinent();
		$categories = $this->category->show();
		$continents = $this->continent->show();
		$article = $this->article->show($id);
		$country = $this->country->getById($article->COUNTRY_ID);
		$category = $this->category->getById($article->CATEGORY_ID);
		$ranking = $this->article->getByRanking();
		$ctry_rank = [];
		foreach($countries as $country){
			$ctry_rank [$country->COUNTRY_ID] = $this->article->countByCountry($country->COUNTRY_ID);
		}

		return View::make('articles.view')
				->withCountries($countries)
				->withCategories($categories)
				->withContinents($continents)
				->withArticle($article)
				->withCountry($country)
				->withCategory($category)
				->withRank($ranking)
				->withCtryrank($ctry_rank);;
	}

	public function showByCategory($id){
		$users = $this->user->allUsers();
		$countries = $this->country->showCountryByContinent();
		$categories = $this->category->show();
		$continents = $this->continent->show();
		$articles = $this->article->getByCategory($id);
		$selected_category = $this->category->getById($id);
		$ranking = $this->article->getByRanking();
		$ctry_rank = [];
		foreach($countries as $country){
			$ctry_rank[$country->COUNTRY_ID] = $this->article->countByCountry($country->COUNTRY_ID);
		}

		return View::make('articles.article_by_category')
				->withCountries($countries)
				->withCategories($categories)
				->withContinents($continents)
				->withCat($selected_category)
				->withArticles($articles)
				->withUsers($users)
				->withRank($ranking)
				->withCtryrank($ctry_rank);
	}

	public function showByCountry($id){
		$users = $this->user->allUsers();
		$countries = $this->country->showCountryByContinent();
		$categories = $this->category->show();
		$continents = $this->continent->show();
		$articles = $this->article->getByCountry($id);
		$selected_country = $this->country->getById($id);
		$ranking = $this->article->getByRanking();
		$ctry_rank = [];
		foreach($countries as $country){
			$ctry_rank [$country->COUNTRY_ID] = $this->article->countByCountry($country->COUNTRY_ID);
		}
		$count = [];

		foreach($categories as $category){
			$count[$category->CATEGORY_ID] = $this->article->countCategoryByCountry($id, $category->CATEGORY_ID);
		}
		arsort($ctry_rank);
		return View::make('articles.article_by_country')
				->withCountries($countries)
				->withCategories($categories)
				->withContinents($continents)
				->withCtry($selected_country)
				->withArticles($articles)
				->withUsers($users)
				->withArtcount($count)
				->withRank($ranking)
				->withCtryrank($ctry_rank);
	}

	public function searchArticle(){
		if(Input::get('ctry-sel') == ""){
			return $this->showByCategory(Input::get('cat-sel'));
		}
		else if(Input::get('cat-sel') == ""){
			return $this->showByCountry(Input::get('ctry-sel'));
		}
		else{
			$users = $this->user->allUsers();
			$selected_country = $this->country->getById(Input::get('ctry-sel'));
			$selected_category = $this->category->getById(Input::get('cat-sel'));
			$articles = $this->article->getByCountryCategory($selected_country->COUNTRY_ID, $selected_category->CATEGORY_ID);
			$count = [];
			$countries = $this->country->showCountryByContinent();
			$categories = $this->category->show();
			$continents = $this->continent->show();
			$ranking = $this->article->getByRanking();
			$ctry_rank = [];

			foreach($categories as $category){
				$count[$category->CATEGORY_ID] = $this->article->countCategoryByCountry(Input::get('ctry-sel'), $category->CATEGORY_ID);
			}

			return View::make('articles.article_search')
					->withCountries($countries)
					->withCategories($categories)
					->withContinents($continents)
					->withCtry($selected_country)
					->withCat($selected_category)
					->withArticles($articles)
					->withUsers($users)
					->withArtcount($count)
					->withRank($ranking)
					->withCtryrank($ctry_rank);

		}
	}

	public function fetchLink(){
		$input = Input::all();
		return View::make('articles.extract_link')
				->withLink($input);
	}

	public function test(){
		$countries = $this->country->showCountryByContinent();
		$categories = $this->category->show();
		$continents = $this->continent->show();
		return View::make('articles.create_test')
				->withCountries($countries)
				->withCategories($categories)
				->withContinents($continents);
	}

	public function addon(){
		$addon = Input::all();
		return View::make('articles.addon')
				->withAddon($addon);
	}

	public function addonEdit(){
		$addon = Input::all();
		return View::make('articles.addon_edit')
				->withAddon($addon);
	}

	public function upload(){
		$image = Input::all();
		return View::make('articles.file_upload')
				->withImage($image);
	}
}

?>