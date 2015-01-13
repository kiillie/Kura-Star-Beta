<?php

use KuraStar\Storage\User\UserRepository as User;

class SessionController extends BaseController{

	protected $user;

	public function __construct(User $user){
		$this->user = $user;
	}	

	public function store(){
		$credentials = [
			'MAIL_ADDRESS' 	=>	Input::get('log_email'),
			'PASSWORD'	=>	Input::get('password')
		];

		$rules = [
			'MAIL_ADDRESS'=>'required',
			'PASSWORD'=>'required'
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