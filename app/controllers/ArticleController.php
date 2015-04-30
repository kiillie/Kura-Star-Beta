<?php


use KuraStar\Storage\Country\CountryRepository as Country;
use KuraStar\Storage\Category\CategoryRepository as Category;
use KuraStar\Storage\Continent\ContinentRepository as Continent;
use KuraStar\Storage\Article\ArticleRepository as Article;
use KuraStar\Storage\User\UserRepository as User;
use KuraStar\Storage\Favorite\FavoriteRepository as Favorite;
use KuraStar\Storage\Facebook\FacebookRepository as FacebookUser;
use KuraStar\Storage\Notification\NotificationRepository as Notification;

class ArticleController extends BaseController{

	protected $country;
	protected $category;
	protected $continent;
	protected $article;
	protected $user;
	protected $favorite;
	protected $fbuser;
	protected $oauth;
	protected $notification;

	public function __construct(Country $country, Category $category, Continent $continent, Article $article, User $user, Favorite $favorite, FacebookUser $fbuser, Notification $notification){
		$this->country = $country;
		$this->category = $category;
		$this->continent = $continent;
		$this->article = $article;
		$this->user = $user;
		$this->favorite = $favorite;
		$this->fbuser = $fbuser;
		$this->oauth = new Hybrid_Auth(app_path().'/config/fb_auth.php');
		$this->notification = $notification;

	}

	public function index($id){
		$countries = $this->country->showCountryByContinent();
		$categories = $this->category->show();
		$continents = $this->continent->show();
		$article = $this->article->show($id);
		$profile = "";
		$hybrid = "";
		
		if(Hybrid_Auth::isConnectedWith('Facebook')){
			$provider = $this->oauth->authenticate('Facebook');
			$profile = $provider->getUserProfile();
			$hybrid = $this->fbuser->getUserById('fb'.$profile->identifier);
		}
		return View::make('articles.create')
				->withCountries($countries)
				->withCategories($categories)
				->withContinents($continents)
				->with('curation', $id)
				->with('status', $article->CURATION_STATUS)
				->with('article', $article)
				->withProfile($profile)
				->withHybrid($hybrid);
	}

	public function insert(){
		if(Hybrid_Auth::isConnectedWith('Facebook')){
			$provider = $this->oauth->authenticate('Facebook');
			$profile = $provider->getUserProfile();
			$insert = $this->article->insert('fb', 'fb'.$profile->identifier);
			$hybrid = $this->fbuser->getUserById('fb'.$profile->identifier);
		}
		else{
			$insert = $this->article->insert('raw', \Auth::user()->CURATER_ID);
		}
		if($insert){
			if(Hybrid_Auth::isConnectedWith('Facebook')){
				$article = $this->article->getArticle('fb'.$profile->identifier);
			}
			else{
				$article = $this->article->getArticle(\Auth::user()->CURATER_ID);
			}
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

	public function insertImg(){
		$input  = Input::all();
		$image = $this->article->insertImage($input);

		if($image){
			$article = $this->article->getById($input['cur_id']);
			return View::make('articles.article_image')
				->withArticle($article);
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
		$data = [];
		if($article != NULL){
			if($input['status'] == 'favorite'){
				$from = $this->user->getUserById(\Auth::user()->CURATER_ID);
				$message = "<a href='/user/profile/{$from->CURATER_ID}'>".$from->CURATER."</a> favorited your <a href='/article/".$input['article']."/view'>Article</a>";
				$data = ['to' => $article->CURATER_ID, 'from' => $input['user'],
				'message' => $message];
				$notification = $this->notification->store($data);
				if($notification){
					$favorite = $this->favorite->store($input['article'], $input['user']);
				}
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
		$fbusers = $this->fbuser->getAllUsers();
		$profile = "";
		$hybrid = "";
		if(Hybrid_Auth::isConnectedWith('Facebook')){
			$provider = $this->oauth->authenticate('Facebook');
			$profile = $provider->getUserProfile();
			$hybrid = $this->fbuser->getUserById('fb'.$profile->identifier);
		}
		$article = $this->article->show($id);
		$ranking = $this->article->getByRanking();
		$ctry_rank = [];
		$views = $this->article->incrementView($id);
		$check = false;
		if($views){
			foreach($countries as $country){
				$ctry_rank [$country->COUNTRY_ID] = $this->article->countByCountry($country->COUNTRY_ID);
			}
			arsort($ctry_rank);
			if(\Auth::check()){
				$check = $this->favorite->check($id, Auth::user()->CURATER_ID);
			}
			else if(Hybrid_Auth::isConnectedWith('Facebook')){
				$check = $this->favorite->check($id, 'fb'.$profile->identifier);
			}
			$count_art = [];
			$count_fave = [];
			foreach($users as $user){
				$count_art[$user->CURATER_ID] = $this->article->countArticlesByUser($user->CURATER_ID);
				$count_fave[$user->CURATER_ID] = $this->favorite->count_favorite_by_user($user->CURATER_ID);
			}
			foreach($fbusers as $fbuser){
				$count_art[$fbuser->CURATER_ID] = $this->article->countArticlesByUser($fbuser->CURATER_ID);
				$count_fave[$fbuser->CURATER_ID] = $this->favorite->count_favorite_by_user($fbuser->CURATER_ID);
			}
			return View::make('articles.view')
					->withCountries($countries)
					->withCategories($categories)
					->withContinents($continents)
					->withArticle($article)
					->withRank($ranking)
					->withCtryrank($ctry_rank)
					->withCheck($check)
					->withFbusers($fbusers)
					->withProfile($profile)
					->withCoart($count_art)
					->withUsers($users)
					->withCofave($count_fave)
					->withHybrid($hybrid);

		}
	}

	public function preview($id){
		$article = $this->article->show($id);
		$countries = $this->country->showCountryByContinent();
		$categories = $this->category->show();
		$continents = $this->continent->show();
		$users = $this->user->allUsers();
		$fbusers = $this->fbuser->getAllUsers();
		$profile = "";
		$hybrid = "";
		if(Hybrid_Auth::isConnectedWith('Facebook')){
			$provider = $this->oauth->authenticate('Facebook');
			$profile = $provider->getUserProfile();
			$user = $this->user->getUserById('fb'.$profile->identifier);
			$hybrid = $this->fbuser->getUserById('fb'.$profile->identifier);
		}
		else{
			$user = $this->user->getUserById(Auth::user()->CURATER_ID);
		}
		$ranking = $this->article->getByRanking();
		$ctry_rank = [];
		foreach($countries as $country){
			$ctry_rank [$country->COUNTRY_ID] = $this->article->countByCountry($country->COUNTRY_ID);
		}
		foreach($users as $user){
			$count_art[$user->CURATER_ID] = $this->article->countArticlesByUser($user->CURATER_ID);
			$count_fave[$user->CURATER_ID] = $this->favorite->count_favorite_by_user($user->CURATER_ID);
		}
		foreach($fbusers as $fbuser){
			$count_art[$fbuser->CURATER_ID] = $this->article->countArticlesByUser($fbuser->CURATER_ID);
			$count_fave[$fbuser->CURATER_ID] = $this->favorite->count_favorite_by_user($fbuser->CURATER_ID);
		}
			arsort($ctry_rank);
		return View::make('articles.preview')
				->withContinents($continents)
				->withCountries($countries)
				->withCategories($categories)
				->withArticle($article)
				->withUser($user)
				->withRank($ranking)
				->withCtryrank($ctry_rank)
				->withProfile($profile)
				->withUsers($users)
				->withFbusers($fbusers)
				->withCoart($count_art)
				->withCofave($count_fave)
				->withHybrid($hybrid);
	}

	public function twitter(){
		$input = Input::all();
		return View::make('articles.addon_twitter')
				->withSearch($input);
	}

	public function tweet(){
		$tid = Input::all();
		return View::make('articles.tweet_by_id')
					->withTweet($tid);
	}

	public function addonPic(){
		$input  = Input::all();
		
		return View::make('articles.addon_pic')
				->withInput($input);
	}

	public function showArticlesByUser($id){
		$articles = $this->article->getByUser($id);
		$allArticles = $this->article->articleLists();
		$drafts = $this->article->getDraftsByUser($id);
		$users = $this->user->allUsers();
		$fbusers = $this->fbuser->getAllUsers();
		$exist = strpos($id, 'fb');
		$profile = "";
		$provider = "";
		$hybrid = "";
		if(Hybrid_Auth::isConnectedWith('Facebook')){
			$provider = $this->oauth->authenticate('Facebook');
			$profile = $provider->getUserProfile();
			$hybrid = $this->fbuser->getUserById('fb'.$profile->identifier);
		}
		if($exist !== false){
			$user = $this->fbuser->getUserById($id);
		}
		else{
			$user = $this->user->getUserById($id);
		}
		$countries = $this->country->showCountryByContinent();
		$categories = $this->category->show();
		$continents = $this->continent->show();
		$count = $this->article->countArticlesByUser($id);
		$favorites = $this->favorite->get_favorite_by_user($id);
		$c_favorite = $this->favorite->count_favorite_by_user($id);
		
		$ranking = $this->article->getByRanking();
		$ctry_rank = [];
		foreach($countries as $country){
			$ctry_rank [$country->COUNTRY_ID] = $this->article->countByCountry($country->COUNTRY_ID);
		}
		arsort($ctry_rank);
		return View::make('users.articles')
				->withContinents($continents)
				->withCountries($countries)
				->withCategories($categories)
				->withArticles($articles)
				->withUser($user)
				->withCount($count)
				->withCfavorite($c_favorite)
				->withFavorites($favorites)
				->withUsers($users)
				->withFbusers($fbusers)
				->withRank($ranking)
				->withCtryrank($ctry_rank)
				->withProfile($profile)
				->withAllarticles($allArticles)
				->withDrafts($drafts)
				->withHybrid($hybrid);
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
		$profile = "";
		$hybrid = "";
		$fbusers = $this->fbuser->getAllUsers();

		if(Hybrid_Auth::isConnectedWith('Facebook')){
			$provider = $this->oauth->authenticate('Facebook');
			$profile = $provider->getUserProfile();
			$hybrid = $this->fbuser->getUserById('fb'.$profile->identifier);
		}
		foreach($countries as $country){
			$ctry_rank[$country->COUNTRY_ID] = $this->article->countByCountry($country->COUNTRY_ID);
		}
		arsort($ctry_rank);
		return View::make('articles.article_by_category')
				->withCountries($countries)
				->withCategories($categories)
				->withContinents($continents)
				->withCat($selected_category)
				->withArticles($articles)
				->withUsers($users)
				->withRank($ranking)
				->withCtryrank($ctry_rank)
				->withProfile($profile)
				->withFbusers($fbusers)
				->withHybrid($hybrid);
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
		$profile = "";
		$hybrid = "";
		$fbusers = $this->fbuser->getAllUsers();
		if(Hybrid_Auth::isConnectedWith('Facebook')){
			$provider = $this->oauth->authenticate('Facebook');
			$profile = $provider->getUserProfile();
			$hybrid = $this->fbuser->getUserById('fb'.$profile->identifier);
		}
		foreach($countries as $country){
			$ctry_rank [$country->COUNTRY_ID] = $this->article->countByCountry($country->COUNTRY_ID);
		}
		$count = [];
		arsort($ctry_rank);
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
				->withCtryrank($ctry_rank)
				->withProfile($profile)
				->withFbusers($fbusers)
				->withHybrid($hybrid);
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
			foreach($countries as $country){
				$ctry_rank [$country->COUNTRY_ID] = $this->article->countByCountry($country->COUNTRY_ID);
			}
			arsort($ctry_rank);
			$profile = "";
			$fbusers = $this->fbuser->getAllUsers();
			$hybrid = "";
			if(Hybrid_Auth::isConnectedWith('Facebook')){
				$provider = $this->oauth->authenticate('Facebook');
				$profile = $provider->getUserProfile();
				$hybrid = $this->fbuser->getUserById('fb'.$profile->identifier);
			}

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
					->withCtryrank($ctry_rank)
					->withProfile($profile)
					->withFbusers($fbusers)
					->withHybrid($hybrid);

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

	public function showFavoritedArticles($id){
		$countries = $this->country->showCountryByContinent();
		$categories = $this->category->show();
		$continents = $this->continent->show();
		$users = $this->user->allUsers();
		$profile = "";
		$exist = strpos($id, 'fb');
		$fbusers = $this->fbuser->getAllUsers();
		if($exist !== false){
			$provider = $this->oauth->authenticate('Facebook');
			$profile = $provider->getUserProfile();
			$user = $this->fbuser->getUserById($id);
		}
		else{
			$user = $this->user->getUserById($id);	
		}
		$count = $this->article->countArticlesByUser($id);
		$favorites = $this->favorite->count_favorite_by_user($id);
		$favorited = $this->favorite->get_favorite_by_user($id);
		$counter = 0;
		$articles = [];
		foreach($favorited as $favorite){
			$articles[$counter] = $this->article->getById($favorite->CURATION_ID);
			$counter++;
		}

		return View::make('users.favorites')
					->withUser($user)
					->withUsers($users)
					->withContinents($continents)
					->withCountries($countries)
					->withCategories($categories)
					->withCount($count)
					->withFavorites($favorites)
					->withFavorited($articles)
					->withProfile($profile)
					->withFbusers($fbusers);
	}

	public function addonEdit(){
		$addon = Input::all();
		return View::make('articles.addon_edit')
				->withAddon($addon);
	}

	public function addonInsert(){
		$addon = Input::all();
		$details = $this->article->insertDetails($addon);
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

	public function delete(){
		$input = Input::all();
		$favorites = $this->favorite->deleteByArticle($input['id']);
		if($favorites){
			$article = $this->article->delete($input['id']);
		}
		else{
			$article = $this->article->delete($input['id']);
		}
		if($article){
			return Redirect::route('user.articles', $input['user'])->with("message", "Article was deleted Successfully.");
		}
		else{
			return Redirect::route('user.articles', $input['user'])->with("message", "Unable to delete this article.");	
		}
	}
}

?>