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

	public function getUserById($id){
		$user = User::where('CURATER_ID', '=', $id)->first();

		return $user;
	}

	public function allUsers(){
		return User::all();
	}

	public function update($input){
		$user = User::where('CURATER_ID', '=', $input['id'])->update(['CURATER' => $input['name'], 'CURATER_DESCRIPTION' => $input['desc']]);
		
		return $user;
	}

	public function delete($id){
		//
	}

}

?>