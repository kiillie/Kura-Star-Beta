<?php namespace KuraStar\Storage\User;

use User;

class EloquentUserRepository implements UserRepository{

	public function store($input){
		$user = new User;
		$user->CURATER = $input['name'];
		$user->MAIL_ADDRESS = $input['email'];
		$user->PASSWORD = \Hash::make($input['password']);

			return $user->save();
	}

	public function allUsers(){
		return User::all();
	}

	public function update($id, $input){
		//
	}

	public function delete($id){
		//
	}

}

?>