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

	public function update($id, $input){
		if(isset($input['name'])){
			$user = User::where('CURATER_ID', '=', $id)->first();
			$user->CURATER = $input['name'];
			return $user->save();
		}
		if(isset($input['about'])){
			$user = User::where('CURATER_ID', '=', $id)->first();
			$user->CURATER_DESCRIPTION = $input['about'];
			return $user->save();
		}
		if(isset($input['prof-pic'])){
			$imgname = str_random(40);
			$upload = $input['prof-pic'];
			$folder = public_path()."/assets/images/attachments/";
			$move = $imgname.".".$upload->getClientOriginalExtension();
			$upload->move($folder, $move);
			$cur_img = "/assets/images/attachments/".$move;

			$user = User::where('CURATER_ID', '=', $id)->first();
			$user->CURATER_IMAGE = $cur_img;
			return $user->save();
		}
	}

	public function delete($id){
		//
	}

}

?>