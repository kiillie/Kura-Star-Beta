<?php
use KuraStar\Storage\Country\CountryRepository as Country;
use KuraStar\Storage\Continent\ContinentRepository as Continent;
use KuraStar\Storage\Category\CategoryRepository as Category;
use KuraStar\Storage\Article\ArticleRepository as Article;
use KuraStar\Storage\User\UserRepository as User;
use KuraStar\Storage\Facebook\FacebookRepository as FacebookUser;

class PublicController extends BaseController{
	protected $country;
	protected $continent;
	protected $category;
	protected $article;
	protected $user;
	protected $fbuser;
	protected $oauth;

	public function __construct(Continent $continent, Country $country, Category $category, Article $article, User $user, FacebookUser $fbuser){
		$this->continent = $continent;
		$this->country = $country;
		$this->category = $category;
		$this->article = $article;
		$this->user = $user;
		$this->fbuser = $fbuser;
		$this->oauth = new Hybrid_Auth(app_path()."/config/fb_auth.php");
	}

	public function index(){
		$countries = $this->country->showCountryByContinent();
		$continents = $this->continent->show();
		$categories = $this->category->show();
		$articles = $this->article->allArticles();
		$users = $this->user->allUsers();
		$fbusers = $this->fbuser->getAllUsers();
		$hybrid = "";
		if(Hybrid_Auth::isConnectedWith('Facebook')){
			$provider = $this->oauth->authenticate('Facebook');
			$profile = $provider->getUserProfile();
			$hybrid = $this->fbuser->getUserById('fb'.$profile->identifier);
		$ranking = $this->article->getByRanking();
		$ctry_rank = [];
		foreach($countries as $country){
			$ctry_rank [$country->COUNTRY_ID] = $this->article->countByCountry($country->COUNTRY_ID);
		}
			arsort($ctry_rank);
			return View::make('public.index')
				->withCountries($countries)
				->withContinents($continents)
				->withCategories($categories)
				->withArticles($articles)
				->withUsers($users)
				->withRank($ranking)
				->withCtryrank($ctry_rank)
				->withProfile($profile)
				->withFbusers($fbusers)
				->withHybrid($hybrid);
		}
		else{

		$ranking = $this->article->getByRanking();
		$ctry_rank = [];
		foreach($countries as $country){
			$ctry_rank [$country->COUNTRY_ID] = $this->article->countByCountry($country->COUNTRY_ID);
		}
			arsort($ctry_rank);
			return View::make('public.index')
				->withCountries($countries)
				->withContinents($continents)
				->withCategories($categories)
				->withArticles($articles)
				->withUsers($users)
				->withRank($ranking)
				->withCtryrank($ctry_rank)
				->withFbusers($fbusers);
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
		return View::make('public.test');
	}

	public function trial(){
		$countries = $this->country->showCountryByContinent();
		$continents = $this->continent->show();
		$categories = $this->category->show();
		$articles = $this->article->allArticles();
		$users = $this->user->allUsers();
		$fbusers = $this->fbuser->getAllUsers();
		if(Hybrid_Auth::isConnectedWith('Facebook')){
			$provider = $this->oauth->authenticate('Facebook');
			$profile = $provider->getUserProfile();

		$ranking = $this->article->getByRanking();
		$ctry_rank = [];
		foreach($countries as $country){
			$ctry_rank [$country->COUNTRY_ID] = $this->article->countByCountry($country->COUNTRY_ID);
		}
			arsort($ctry_rank);
			return View::make('public.index')
				->withCountries($countries)
				->withContinents($continents)
				->withCategories($categories)
				->withArticles($articles)
				->withUsers($users)
				->withRank($ranking)
				->withCtryrank($ctry_rank)
				->withProfile($profile)
				->withFbusers($fbusers);
		}
		else{

		$ranking = $this->article->getByRanking();
		$ctry_rank = [];
		foreach($countries as $country){
			$ctry_rank [$country->COUNTRY_ID] = $this->article->countByCountry($country->COUNTRY_ID);
		}
			arsort($ctry_rank);
			return View::make('public.index')
				->withCountries($countries)
				->withContinents($continents)
				->withCategories($categories)
				->withArticles($articles)
				->withUsers($users)
				->withRank($ranking)
				->withCtryrank($ctry_rank)
				->withFbusers($fbusers);
		}
	}

	public function privacypolicy(){
		$countries = $this->country->showCountryByContinent();
		$continents = $this->continent->show();
		$categories = $this->category->show();
		$articles = $this->article->allArticles();
		$users = $this->user->allUsers();
		$fbusers = $this->fbuser->getAllUsers();
		$ranking = $this->article->getByRanking();
		$ctry_rank = [];
		foreach($countries as $country){
			$ctry_rank [$country->COUNTRY_ID] = $this->article->countByCountry($country->COUNTRY_ID);
		}
		arsort($ctry_rank);
		return View::make('public.privacy-policy') //this will get the view you just made in the previous instruction.
				->withCountries($countries)
				->withContinents($continents)
				->withCategories($categories)
				->withArticles($articles)
				->withUsers($users)
				->withRank($ranking)
				->withCtryrank($ctry_rank)
				->withFbusers($fbusers);
	}

	public function termsofservices(){
		$countries = $this->country->showCountryByContinent();
		$continents = $this->continent->show();
		$categories = $this->category->show();
		$articles = $this->article->allArticles();
		$users = $this->user->allUsers();
		$fbusers = $this->fbuser->getAllUsers();
		$ranking = $this->article->getByRanking();
		$ctry_rank = [];
		foreach($countries as $country){
			$ctry_rank [$country->COUNTRY_ID] = $this->article->countByCountry($country->COUNTRY_ID);
		}
		arsort($ctry_rank);
		return View::make('public.terms-of-services') //this will get the view you just made in the previous instruction.
				->withCountries($countries)
				->withContinents($continents)
				->withCategories($categories)
				->withArticles($articles)
				->withUsers($users)
				->withRank($ranking)
				->withCtryrank($ctry_rank)
				->withFbusers($fbusers);
	}

	public function About_us(){
		$countries = $this->country->showCountryByContinent();
		$continents = $this->continent->show();
		$categories = $this->category->show();
		$articles = $this->article->allArticles();
		$users = $this->user->allUsers();
		$fbusers = $this->fbuser->getAllUsers();
		$ranking = $this->article->getByRanking();
		$ctry_rank = [];
		foreach($countries as $country){
			$ctry_rank [$country->COUNTRY_ID] = $this->article->countByCountry($country->COUNTRY_ID);
		}
		arsort($ctry_rank);
		return View::make('public.about_us') //this will get the view you just made in the previous instruction.
				->withCountries($countries)
				->withContinents($continents)
				->withCategories($categories)
				->withArticles($articles)
				->withUsers($users)
				->withRank($ranking)
				->withCtryrank($ctry_rank)
				->withFbusers($fbusers);
	}

}

?>