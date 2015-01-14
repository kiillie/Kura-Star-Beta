<?php

use KuraStar\Storage\User\UserRepository as User;
use KuraStar\Storage\Continent\ContinentRepository as Continent;
use KuraStar\Storage\Country\CountryRepository as Country;
use KuraStar\Storage\Category\CategoryRepository as Category;

class SessionController extends BaseController{

	protected $user;
	protected $continent;
	protected $country;
	protected $category;

	public function __construct(User $user, Continent $continent, Country $country, Category $category){
		$this->user = $user;
		$this->continent = $continent;
		$this->country = $country;
		$this->category = $category;
	}	

	public function create(){
		$countries = $this->country->showCountryByContinent();
		$continents = $this->continent->show();
		$categories = $this->category->show();

		return View::make('public.login')
				->withCountries($countries)
				->withContinents($continents)
				->withCategories($categories);
	}

	public function store(){
		$credentials = [
			'MAIL_ADDRESS' 	=>	Input::get('log_email'),
			'password'	=>	Input::get('password')
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

	public function destroy(){

		Auth::logout();
		return Redirect::route('index');

	}
}

?>