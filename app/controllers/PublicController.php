<?php
use KuraStar\Storage\Country\CountryRepository as Country;
use KuraStar\Storage\Continent\ContinentRepository as Continent;
use KuraStar\Storage\Category\CategoryRepository as Category;
use KuraStar\Storage\Article\ArticleRepository as Article;
use KuraStar\Storage\User\UserRepository as User;

class PublicController extends BaseController{
	protected $country;
	protected $continent;
	protected $category;
	protected $article;
	protected $user;
	protected $oauth;

	public function __construct(Continent $continent, Country $country, Category $category, Article $article, User $user){
		$this->continent = $continent;
		$this->country = $country;
		$this->category = $category;
		$this->article = $article;
		$this->user = $user;
		$this->oauth = new Hybrid_Auth(app_path()."/config/fb_auth.php");
	}

	public function index(){
		$countries = $this->country->showCountryByContinent();
		$continents = $this->continent->show();
		$categories = $this->category->show();
		$articles = $this->article->allArticles();
		$users = $this->user->allUsers();
		if(Hybrid_Auth::isConnectedWith('Facebook')){
			$provider = $this->oauth->authenticate('Facebook');
			$profile = $provider->getUserProfile();
			

			return View::make('public.index')
				->withCountries($countries)
				->withContinents($continents)
				->withCategories($categories)
				->withArticles($articles)
				->withUsers($users)
				->withProfile($profile);
		}
		else{
			return View::make('public.index')
				->withCountries($countries)
				->withContinents($continents)
				->withCategories($categories)
				->withArticles($articles)
				->withUsers($users);
		}
	}

	public function registration(){
		$countries = $this->country->showCountryByContinent();
		$continents = $this->continent->show();
		$categories = $this->category->show();

		return View::make('public.registration')
				->withCountries($countries)
				->withContinents($continents)
				->withCategories($categories);
	}

	public function test(){
		return View::make('public.test');
	}

	public function tester(){
		return View::make('public.google');
	}
}

?>