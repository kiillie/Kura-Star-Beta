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
	
	public function update($input){
		$user = FacebookUser::where('CURATER_ID', '=', $input['id'])->update(['CURATER' => $input['name'], 'CURATER_DESCRIPTION' => $input['desc']]);
		
		return $user;
	}
	
	public function image($input){
		$imgname = str_random(40);
		$upload = $input['image'];
		$folder = public_path()."/assets/images/attachments/";
		$move = $imgname.".".$upload->getClientOriginalExtension();
		$upload->move($folder, $move);
		$cur_img = "/assets/images/attachments/".$move;
		$user = FacebookUser::where('CURATER_ID', '=', $input['id'])->first();
		
		if($user->CURATER_IMAGE != ""){
			if(file_exists(public_path().$user->CURATER_IMAGE)){
				if(unlink(public_path().$user->CURATER_IMAGE)){
					$update = ['result' => FacebookUser::where('CURATER_ID', '=', $input['id'])->update(['CURATER_IMAGE' => $cur_img]), 'image' => $cur_img];
				}
			}
			else{
				$update = ['result' => FacebookUser::where('CURATER_ID', '=', $input['id'])->update(['CURATER_IMAGE' => $cur_img]), 'image' => $cur_img];
			}
		}
		else{
			$update = ['result' => FacebookUser::where('CURATER_ID', '=', $input['id'])->update(['CURATER_IMAGE' => $cur_img]), 'image' => $cur_img];
		}
		return $update;
	}

}

?>