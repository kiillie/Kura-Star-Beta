<?php


use KuraStar\Storage\Country\CountryRepository as Country;
use KuraStar\Storage\Category\CategoryRepository as Category;
use KuraStar\Storage\Continent\ContinentRepository as Continent;
use KuraStar\Storage\Article\ArticleRepository as Article;
use KuraStar\Storage\User\UserRepository as User;
use KuraStar\Storage\Favorite\FavoriteRepository as Favorite;

class ArticleController extends BaseController{

	protected $country;
	protected $category;
	protected $continent;
	protected $article;
	protected $user;
	protected $favorite;

	public function __construct(Country $country, Category $category, Continent $continent, Article $article, User $user, Favorite $favorite){
		
		$this->country = $country;
		$this->category = $category;
		$this->continent = $continent;
		$this->article = $article;
		$this->user = $user;
		$this->favorite = $favorite;

	}

	public function index($id){
		$countries = $this->country->showCountryByContinent();
		$categories = $this->category->show();
		$continents = $this->continent->show();
		$article = $this->article->show($id);

		return View::make('articles.create')
				->withCountries($countries)
				->withCategories($categories)
				->withContinents($continents)
				->with('curation', $id)
				->with('status', $article->CURATION_STATUS)
				->with('article', $article);
	}

	public function insert(){
		$insert = $this->article->insert();
		if($insert){
			$article = $this->article->getArticle();
			$files = fopen(public_path()."/assets/articles/".$article->CURATION_ID.".php", "w");
			$id = $article->CURATION_ID;
			$publish = $article->CURATION_STATUS;
			return Redirect::route('article.create', $id)->with('curation', $id)->with('status', $publish)->with('article', $article);
		}
	}

	public function store(){
		$article = $this->article->store(Input::all());
		$input = Input::all();
		if($article){
			return Redirect::route('article.create', $input['cur_id'])
					->with('message', 'Article Saved.');
		}
		else{
			return Redirect::route('article.create', $input['cur_id'])
					->with('message', 'Article was not saved.');
		}

	}

	public function publish(){
		$publish = $this->article->publish(Input::all());
		$input = Input::all();
		if($publish){
			return Redirect::route('article.create', $input['id'])
					->with('message', 'Article was published successfully!');
		}
		else{
			return Redirect::route('article.create', $input['id'])
					->with('message', 'Article was not published!');
		}
	}

	public function favorite(){
		$input = Input::all();
		$article = $this->article->getById($input['article']);
		if($article != NULL){
			if($input['status'] == 'favorite'){
				$favorite = $this->favorite->store($input['article'], $input['user']);
			}
			else{
				$favorite = $this->favorite->delete($input['article'], $input['user']);
			}
			
			return View::make('articles.favorite')
					->withFavorite($favorite)
					->withStatus($input['status']);
		}
		else{
			return View::make('article.favorite')
					->withFavorite(false);
		}
	}

	public function show($id){
		$users = $this->user->allUsers();
		$countries = $this->country->showCountryByContinent();
		$categories = $this->category->show();
		$continents = $this->continent->show();
		$article = $this->article->show($id);
		$ranking = $this->article->getByRanking();
		$ctry_rank = [];
		$views = $this->article->incrementView($id);
		$tocheck = "";
		if($views){
			foreach($countries as $country){
				$ctry_rank [$country->COUNTRY_ID] = $this->article->countByCountry($country->COUNTRY_ID);
			}
			if(\Auth::check()){
				$check = $this->favorite->check($id, Auth::user()->CURATER_ID);
			}
			return View::make('articles.view')
					->withCountries($countries)
					->withCategories($categories)
					->withContinents($continents)
					->withArticle($article)
					->withRank($ranking)
					->withCtryrank($ctry_rank)
					->withCheck($check);

		}

	}

	public function preview($id){
		$article = $this->article->show($id);
		$countries = $this->country->showCountryByContinent();
		$categories = $this->category->show();
		$continents = $this->continent->show();
		$user = $this->user->getUserById(Auth::user()->CURATER_ID);
		$ranking = $this->article->getByRanking();
		$ctry_rank = [];
		foreach($countries as $country){
			$ctry_rank [$country->COUNTRY_ID] = $this->article->countByCountry($country->COUNTRY_ID);
		}

		return View::make('articles.preview')
				->withContinents($continents)
				->withCountries($countries)
				->withCategories($categories)
				->withArticle($article)
				->withUser($user)
				->withRank($ranking)
				->withCtryrank($ctry_rank);
	}

	public function showArticlesByUser($id){
		$articles = $this->article->getByUser($id);
		$user = $this->user->getUserById($id);
		$countries = $this->country->showCountryByContinent();
		$categories = $this->category->show();
		$continents = $this->continent->show();
		$count = $this->article->countArticlesByUser($id);

		return View::make('users.articles')
				->withContinents($continents)
				->withCountries($countries)
				->withCategories($categories)
				->withArticles($articles)
				->withUser($user)
				->withCount($count);
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

	public function addonInsert(){
		$addon = Input::all();
		return View::make('articles.addon_insert')
				->withAddon($addon);
	}

	public function addonDelete(){
		$addon = Input::all();

		return View::make('articles.delete_image')
				->withAddon($addon);
	}

	public function upload(){
		$image = Input::all();
		return View::make('articles.file_upload')
				->withImage($image);
	}
}

?>