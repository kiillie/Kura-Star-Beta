<?php namespace KuraStar\Storage\User;

use User;

class EloquentUserRepository implements UserRepository{

	public function store($input){
		$user = new User;
		$user->name = $input['name'];
		$user->email = $input['email'];
		$user->password = \Hash::make($input['password']);

		if($input['password'] == $input['confirm_password']){
			return $user->save();
		}
		else{
			return false;
		}
	}

	public function update($id, $input){
		//
	}

	public function delete($id){
		//
	}

}

?>