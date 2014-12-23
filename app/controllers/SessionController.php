<?php

use KuraStar\Storage\User\UserRepository as User;

class SessionController extends BaseController{

	protected $user;

	public function __construct(User $user){
		$this->user = $user;
	}	

	public function store(){
		$credentials = [
			'email' 	=>	Input::get('email'),
			'password'	=>	Input::get('password')
		];

		if(Auth::attempt($credentials)){
			return Redirect::route('index')
					->with('message', 'Welcome!');
		}
		else{
			return Redirect::back()
					->with('message_login', 'Incorrect Email or Password');
		}
	}

	public function destroy(){

		Auth::logout();
		return Redirect::route('index');

	}
}

?>