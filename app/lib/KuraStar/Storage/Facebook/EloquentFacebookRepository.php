<?php namespace KuraStar\Storage\Facebook;

use FacebookUser;

class EloquentFacebookRepository implements FacebookRepository{

	public function store($cred){
		$fbuser = new FacebookUser;
		$fbuser->CURATER_ID = "fb".$cred['id'];
		$fbuser->CURATER = $cred['name'];
		$fbuser->CURATER_IMAGE = $cred['image'];
		$fbuser->CURATER_SITE = $cred['site'];

		return $fbuser->save();
	}

	public function check($id){
		$check = FacebookUser::where('CURATER_ID', '=', $id)->first();

		if($check == NULL){
			return false;
		}
		else{
			return true;
		}
	}

	public function getUserById($id){
		$user = FacebookUser::where('CURATER_ID', '=', $id)->first();
		
		return $user;
	}

	public function getAllUsers(){
		$users = FacebookUser::all();

		return $users;
	}

}

?>