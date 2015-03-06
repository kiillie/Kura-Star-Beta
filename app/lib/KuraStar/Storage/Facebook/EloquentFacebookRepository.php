<?php namespace KuraStar\Storage\Facebook;

use FacebookUser;

class EloquentFacebookRepository implements FacebookRepository{

	public function store($cred){
		$fbuser = new FacebookUser;
		$fbuser->FB_ID = "fb".$cred['id'];
		$fbuser->CURATER = $cred['name'];

		return $fbuser->save();
	}

}

?>