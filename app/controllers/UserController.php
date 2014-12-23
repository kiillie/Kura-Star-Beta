<?php

use KuraStar\Storage\User\UserRepository as User;

class UserController extends BaseController{
	
	protected $user;

	public function __construct(User $user){
		$this->user = $user;
	}

	public function store(){
		$save = $this->user->store(Input::all());
		
		if($save){
			return Redirect::route('registration')
					->with('message', 'Successfully Registered!');
		}
		else{
			return Redirect::route('registration')
					->with('message', 'There was an error upon registration.');
		}
	}
}

?>