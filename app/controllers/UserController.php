<?php

use KuraStar\Storage\User\UserRepository as User;
use KuraStar\Storage\Continent\ContinentRepository as Continent;
use KuraStar\Storage\Country\CountryRepository as Country;
use KuraStar\Storage\Category\CategoryRepository as Category;
use KuraStar\Storage\Article\ArticleRepository as Article;
use KuraStar\Storage\Favorite\FavoriteRepository as Favorite;
use KuraStar\Storage\Facebook\FacebookRepository as FacebookUser;
use KuraStar\Storage\Notification\NotificationRepository as Notification;

class UserController extends BaseController{
	
	protected $user;
	protected $continent;
	protected $country;
	protected $category;
	protected $article;
	protected $favorite;
	protected $fbuser;
	protected $oauth;
	protected $notification;

	public function __construct(User $user, Continent $continent, Country $country, Category $category, Article $article, Favorite $favorite, FacebookUser $fbuser, Notification $notification){
		$this->user = $user;
		$this->continent = $continent;
		$this->country = $country;
		$this->category = $category;
		$this->article = $article;
		$this->favorite = $favorite;
		$this->fbuser = $fbuser;
		$this->oauth = new Hybrid_Auth(app_path().'/config/fb_auth.php');
		$this->notification = $notification;
	}

	public function store(){
		$validate = new \KuraStar\Services\Validators\User;

		if($validate->passes()){
			$save = $this->user->store(Input::all());

			return $this->login(Input::all());
		}
		else{
			$errors = $validate->getErrors();

			return Redirect::route('registration')
					->withInput()
					->with('message', $errors->toArray());
		}
	}

	public function login($input){
		$credentials = [
			'MAIL_ADDRESS' 	=>	$input['email'],
			'password'	=>	$input['password']
		];

		$rules = [
			'MAIL_ADDRESS'=>'required',
			'password'=>'required'
		];


		$validator =  Validator::make($credentials, $rules);

		if($validator->passes()){
			if(Auth::attempt($credentials)){
				return Redirect::route('index')
						->with('message', 'Welcome!');
			}
			else{
				return Redirect::back()
						->withInput()
						->with('message_login', 'Incorrect Email or Password');
			}
		}
		else{
			return Redirect::back()
				->withErrors($validator)
				->withInput()
				->with('message_login', 'Invalid Email Address or Password');
		}
	}

	public function profile($id){
		$countries = $this->country->showCountryByContinent();
		$categories = $this->category->show();
		$continents = $this->continent->show();
		$exist = strpos($id, 'fb');
		$profile = "";
		$logged = false;
		if($exist !== FALSE && Hybrid_Auth::isConnectedWith('Facebook')){
			$provider = $this->oauth->authenticate('Facebook');
			$profile = $provider->getUserProfile();
			$user = $this->fbuser->getUserById($id);
			$logged = true;
		}
		else if($exist !== FALSE && !Hybrid_Auth::isConnectedWith('Facebook')){
			$user = $this->fbuser->getUserById($id);
		}
		else if(Auth::check()){
			$user = $this->user->getUserById($id);
			$logged = true;
		}
		else{
			$user = $this->user->getUserById($id);
		}
		
		$count = $this->article->countArticlesByUser($id);
		$favorites = $this->favorite->count_favorite_by_user($id);
		$notifications = $this->notification->getByUserId($id);
		if($logged && $user->CURATER_ID == $id){
			return View::make('users.notifications')
						->withNotifications($notifications)
						->withUser($user)
						->withContinents($continents)
						->withCountries($countries)
						->withCategories($categories)
						->withCount($count)
						->withFavorites($favorites)
						->withProfile($profile);
		}
		else{
			return View::make('users.view_profile')
						->withUser($user)
						->withContinents($continents)
						->withCountries($countries)
						->withCategories($categories)
						->withCount($count)
						->withFavorites($favorites)
						->withProfile($profile);
		}
	}
	
	public function curators(){
		$fbusers = $this->fbuser->getAllUsers();
		$users = $this->user->allUsers();
		
		$curators = $this->article->getArticlesOrderBy();
		
		return View::make('users.curators')
					->withFbusers($fbusers)
					->withUsers($users)
					->withCurators($curators);
	}
	
	public function edit($id){
		$countries = $this->country->showCountryByContinent();
		$categories = $this->category->show();
		$continents = $this->continent->show();
		$user = $this->user->getUserById($id);

		return View::make('users.edit')
					->withUser($user)
					->withContinents($continents)
					->withCountries($countries)
					->withCategories($categories);
	}

	public function update(){
		$input = Input::all();
		$update = $this->user->update($input['id'], $input);
		if(isset($input['prof-pic'])){
			return Redirect::back();
		}
		else{
			return View::make('users.update')
					->withInput($input);
		}
	}
}

?>