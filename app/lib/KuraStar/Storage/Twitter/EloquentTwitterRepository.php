<?php namespace KuraStar\Storage\Twitter;

use TwitterUser;

class EloquentTwitterRepository implements TwitterRepository{

	public function store($cred){
		$twuser = new TwitterUser;
		$twuser->CURATER_ID = "tw".$cred['id'];
		$twuser->CURATER = $cred['name'];
		$twuser->CURATER_IMAGE = $cred['image'];
		$twuser->CURATER_SITE = $cred['site'];

		return $twuser->save();
	}

	public function check($id){
		$check = TwitterUser::where('CURATER_ID', '=', $id)->first();

		if($check == NULL){
			return false;
		}
		else{
			return true;
		}
	}

}

?>