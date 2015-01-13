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

			return Redirect::route('registration')
					->with('message', 'Successfully Registered!');
		}
		else{
			$errors = $validate->getErrors();

			return Redirect::route('registration')
					->withInput()
					->with('message', $errors->toArray());
		}
	}
}

?>