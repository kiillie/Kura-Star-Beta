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
	
	public function image($input){
			$imgname = str_random(40);
			$upload = $input['image'];
			$folder = public_path()."/assets/images/attachments/";
			$move = $imgname.".".$upload->getClientOriginalExtension();
			$upload->move($folder, $move);
			$cur_img = "/assets/images/attachments/".$move;
			$user = User::where('CURATER_ID', '=', $input['id'])->first();
			
			if($user->CURATER_IMAGE != ""){
				if(file_exists(public_path().$user->CURATER_IMAGE)){
					if(unlink(public_path().$user->CURATER_IMAGE)){
						$update = ['result' => User::where('CURATER_ID', '=', $input['id'])->update(['CURATER_IMAGE' => $cur_img]), 'image' => $cur_img];
					}
				}
				else{
					$update = ['result' => User::where('CURATER_ID', '=', $input['id'])->update(['CURATER_IMAGE' => $cur_img]), 'image' => $cur_img];
				}
			}
			else{
				$update = ['result' => User::where('CURATER_ID', '=', $input['id'])->update(['CURATER_IMAGE' => $cur_img]), 'image' => $cur_img];
			}
			
			return $update;
	}

	public function delete($id){
		//
	}

}

?>