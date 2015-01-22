<?php

use KuraStar\Storage\User\UserRepository as User;

class UserController extends BaseController{
	
	protected $user;

	public function __construct(User $user){
		$this->user = $user;
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
}

?>